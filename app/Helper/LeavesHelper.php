<?php

namespace App\Helper;

use Carbon\Carbon;
use App\Leave;
use App\Log;
use App\LeaveBalance;
use App\LeavePolicy;
use App\LeaveState;
use App\LeaveTypes;
use App\GovHoliday;

class LeavesHelper
{
    public static function validationArray($request)
    {
        $type = LeaveTypes::find($request->type);

        if ($type->name != 'Maternity') {
            if ($request->single_day == null) {
                return [
                    'start' => 'required',
                    'end' => 'required',
                    'reason' => 'nullable|max:150',
                    'type' => 'required',
                ];
            } else {
                return [
                    'start' => 'required',
                    'reason' => 'nullable|max:150',
                    'type' => 'required',
                ];
            }
        } else {
            return [
                'due_date' => 'required',
            ];
        }
    }
    public function leaveCount($request)
    {
        if ($request->single_day) {
            return (1 - 0.5 * $request->start_half);
        }

        $count = Carbon::parse($request->start)->diffInDays(Carbon::parse($request->end)) + 1;

        if ($request->start_half || $request->end_half) {
            $count -= 0.5 * ($request->start_half + $request->end_half);
        }

        return $count;
    }

    public function findExpirationDate($leave)
    {   
        $exp = Carbon::parse($leave->starting);
        $values = explode(' ', $leave->expiration);

        if ($values[1] == 'year') {
            $exp->addYears($values[0]);
        } elseif ($values[1] == 'month') {
            $exp->addMonths($values[0]);
        } else {
            $exp->addWeeks($values[0]);
        }

        return $exp;
    }

    public function validateData($request)
    {
        $leave = LeaveTypes::find($request->type);
        $balance = LeaveBalance::where('user_id', auth()->user()->id)
            ->where('type', $leave->name)->first();

        if ($this->validateBalance($balance, $request) 
            && $this->validateMinNotification($request->start, $leave)
            && $this->validateExpiration($leave, $request)) {
            return true;
        }

        return false;
    }

    public function validateMinNotification($date, $leave)
    {
        $now = Carbon::now();

        if ($now->diffInDays(Carbon::parse($date), false) < $leave->min_notification) {
            return false;
        }

        return true;
    }

    public function validateBalance($balance, $request)
    {
        if ($balance->balance >= $this->leaveCount($request)) {
            return true;
        }

        return false;
    }

    public function validateExpiration($leave, $request)
    {
        if (is_null($leave->expiration)) {
            return true;
        }

        $exp = $this->findExpirationDate($leave);
        $end = Carbon::parse($request->end);

        if ($end->lessThanOrEqualTo($exp)) {
            return true;
        }

        return false;
    }

    public function policyCheck($request)
    {
        $policies = LeavePolicy::where('leave_type_id', $request->type)->where('allow_block', true)->get();

        if (count($policies) == 0) {
            return [true, ''];
        }

        $count = $this->leaveCount($request);

        foreach ($policies as $policy) {
            if (is_null($policy->max) || $policy->max <= $count) {
                return [true, ''];
            } elseif (!$policy->allow_overflow && $policy->allow_block) {
                return [false, $policy->message];
            }
        }

        return [true, ''];
    }

    public function createStates($request)
    {
        $type = LeaveTypes::find($request->type);
        $leave = $this->createLeave($request);
        $messages = [];
        $count = $this->leaveCount($request);

        foreach ($type->policies as $policy) {
            $state = LeaveState::create([
                'leave_id' => $leave->id,
                'serial' => $policy->serial,
                'branch_id' => auth()->user()->branch_id,
                'role_id' => $policy->role_id,
            ]);

            if (!is_null($policy->message)) {
                array_push($messages, $policy->message);
            }

            if (is_null($policy->max) || $policy->max <= $count) {
                break;
            }
        }

        return $messages;
    }

    public function createLeave($request)
    {
        $leave = Leave::create([
            'user_id' => auth()->user()->id,
            'type' => $request->type,
            'start' => Carbon::parse($request->start)->toDateString(),
            'end' => $request->single_day ? Carbon::parse($request->start)->toDateString() : Carbon::parse($request->end)->toDateString(),
            'is_approved' => 0,
            'is_removed' => false,
            'branch_id' => auth()->user()->branch_id,
            'comment' => $request->reason,
            'start_is_half' => $request->start_half,
            'end_is_half' => $request->end_half,
            'due_date' => $request->due_date,
        ]);

        return $leave;
    }

    public function reserializePolicy($type)
    {
        $type = LeaveTypes::find($type);
        $policies = LeavePolicy::where('leave_type_id', $type->id)->orderBy('serial')->get();

        for ($i = 1; $i <= count($policies); $i++) {
            $policies[$i - 1]->serial = $i;
            $policies[$i - 1]->save();
        }

        return;
    }

    public function createBalance($user)
    {
        $types = $user->roles->first()->leaveTypes;

        foreach ($types as $type) {
            $balance = LeaveBalance::where('user_id', $user->id)->where('type', $type->name)->first();

            if ($balance == null && ($type->gender == 'all' || ucfirst($type->gender) == $user->gender)) {
                $balance = LeaveBalance::create([
                    'user_id' => $user->id,
                    'type' => $type->name,
                    'balance' => is_null($type->base) ? 0 : ($type->name == 'Sick' && Carbon::parse($user->joining_date)->diffInYears(Carbon::now()) < 1 ? 0 : $type->base),
                    'locked' => false,
                ]);
            }
        }

        return;
    }

    public function govHolidayChecker($user)
    {
        $now = Carbon::now()->addDays(1)->toDateString();
        $holiday = GovHoliday::whereDate('starting', '<=', $now)->whereDate('ending', '>=', $now)->whereIn('religion', ['all', $user->religion])->first();

        if (!is_null($holiday)) {
            $type = $this->findType($user->roles->first()->id, 'Substitute');
            $balance = LeaveBalance::where('user_id', $user->id)->where('type', $type->name)->first();
            
            if ($balance == null) {
                $this->createBalance($user);
            }

            if (!$balance->locked && $type->ceil >= $balance->balance) {
                $balance->balance = $balance->balance + 1;
                $balance->save();
            }
        }

        return;
    }

    public function annualBalanceChecker($user)
    {
        $type = $this->findType($user->roles->first()->id, 'Annual');
        $logs = Log::where('user_id', $user->id)->whereNull('counted')->orderBy('date', 'ASC')->get();

        if ($this->findWorkingDays($user, $logs) >= 18 && !$user->leaveBalance->where('type', 'Annual')->first()->locked) {
            $balance = LeaveBalance::where('user_id', $user->id)->where('type', $type->name)->first();
            $flag = ($balance->balance < $type->ceil);
            $balance->balance = $balance->balance + 1;

            if ($flag && $balance->balance >= $type->ceil) {
                $balance->locked = true;
            }

            $balance->save();

            foreach ($logs as $log) {
                $log->counted = true;
                $log->timestamps = false;
                $log->save();
            }
        }

        return;
    }

    public function findWorkingDays($user, $logs)
    {
        if (count($logs) == 0) {
            return 0;
        }

        $workingDays = 0;
        $start = Carbon::parse($logs[0]->date);
        $end = Carbon::parse($logs[count($logs) - 1]->date);

        while ($start <= $end) {
            $mins = 0;

            foreach ($logs->where('date', $start->copy()->toDateString()) as $log) {
                $mins += Carbon::parse($log->start)->diffInMinutes(Carbon::parse($log->end));
            }

            if ($mins >= 180) {
                $workingDays++;
            }

            $start->addDays(1);
        }

        return $workingDays;
    }

    public function sickIncrementer($user)
    {
        $type = $this->findType($user->roles->first()->id, 'Sick');
        $balance = LeaveBalance::where('user_id', $user->id)->where('type', 'Sick')->first();
        $diff = Carbon::parse($user->joining_date)->diffInMonths(Carbon::now());

        if ($diff > $balance->locked && $diff <= 12) {
            $balance->balance = $balance->balance + ($type->base / 12);
            $balance->locked = $diff;
            $balance->save();
        }

        return;
    }

    public function findType($role, $name)
    {
        return LeaveTypes::where('role_id', $role)->where('name', $name)->first();
    }
}