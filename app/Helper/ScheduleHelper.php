<?php

namespace App\Helper;

use Carbon\Carbon;
use App\Leave;
use App\User;
use App\LeaveBalance;
use App\LeavePolicy;
use App\LeaveState;
use App\LeaveTypes;
use App\GovHoliday;

class ScheduleHelper
{
    public function infoFinder($date, $user)
    {
        $messages = [];
        array_push($messages, $this->leaveFinder($date, $user));
        array_push($messages, $this->holidayFinder($date, $user));

        return $messages;
    }

    public function leaveFinder($date, $user)
    {
        $leave = Leave::where('start', '<=', $date)->where('end', '>=', $date)->where('user_id', $user)->where('is_approved', 1)->first();

        if (!is_null($leave)) {
            if (Carbon::parse($leave->start) == Carbon::parse($date) || Carbon::parse($leave->end) == Carbon::parse($date)) {
                if ($leave->start_is_half || $leave->end_is_half) {
                    return 'Half day '.$leave->leaveType->name.' leave';
                }
            }
        }

        return null;
    }

    public function scheduleLeaveFinder($date, $user)
    {
        $leave = Leave::where('start', '<=', $date)->where('end', '>=', $date)->where('user_id', $user->id)->where('is_approved', 1)->first();

        if (!is_null($leave)) {
            if ((Carbon::parse($leave->start) != Carbon::parse($date) || Carbon::parse($leave->end) != Carbon::parse($date))
                || (Carbon::parse($leave->start) == Carbon::parse($date) && !$leave->start_is_half) || 
                (Carbon::parse($leave->end) == Carbon::parse($date) && !$leave->end_is_half)) {
                return [true, $leave->leavetype->name.' Leave'];
            }
        }

        return [false, ''];
    }

    public function holidayFinder($date, $user)
    {
        $user = User::find($user);
        $holiday = GovHoliday::where('starting', '<=', $date)->where('ending', '>=', $date)->where('religion', 'All')->first();

        if ($holiday != null) {
            return $holiday->name;
        }

        $holiday = GovHoliday::where('starting', '<=', $date)->where('ending', '>=', $date)->where('religion', $user->religion)->first();

        if ($holiday != null) {
            return $holiday->name;
        }

        return null;
    }
}