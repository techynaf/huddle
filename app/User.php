<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Carbon\Carbon;
use App\Branch;
use App\Schedule;
use App\Log;
use App\Role;
use App\Leave;
use App\NoSchedule;
use App\Late;
use App\ScheduleEdit;
use App\LogUpdate;
use App\Managers;
use App\LeaveState;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function branch ()
    {
        return $this->belongsTo('App\Branch');
    }

    public function log ()
    {
        return $this->hasMany('App\Log');
    }

    public function leave ()
    {
        return $this->hasMany('App\Leave');
    }

    public function roles ()
    {
        return $this->belongsToMany('App\Role');
    }

    public function schedule ()
    {
        return $this->hasMany('App\Schedule');
    }

    public function noSchedule ()
    {
        return $this->hasMany('App\NoSchedule');
    }

    public function disabledBy ()
    {
        return $this->hasMany('App\NoSchedule', 'manager_id');
    }

    public function lates ()
    {
        return $this->hasMany('App\Late');
    }

    public function approved ()
    {
        return $this->hasMany('App\Late', 'altered_by');
    }

    public function edited ()
    {
        return $this->hasMany('App\LogUpdate');
    }

    public function manager ()
    {
        return $this->hasOne('App\Managers');
    }

    public function actedOn()
    {
        return $this->hasMany('App\LeaveStatus');
    }

    public function leaveBalance()
    {
        return $this->hasMany('App\LeaveBalance');
    }

    public function pendingLeaveRequests()
    {
        $branch = $this->branch;
        $branches = $branch->descendents;
        $states = LeaveState::where('role_id', $this->roles->first()->id)->whereIn('branch_id', $branches)->
            whereNull('action')->get();

        return $states;
    }

    public function designation()
    {
        return $this->belongsTo('App\Designation');
    }

    public function scheduleStart($date)
    {
        $schedule = Schedule::where('user_id', $this->attributes['id'])->where('date', $date)->first();
        
        if ($schedule == null) {
            return '--:--';
        }

        return Carbon::parse($schedule->start)->format('h:i a');
    }

    public function scheduleEnd($date)
    {
        $schedule = Schedule::where('user_id', $this->attributes['id'])->where('date', $date)->first();
        
        if ($schedule == null) {
            return '--:--';
        }

        return Carbon::parse($schedule->end)->format('h:i a');
    }

    public function getIsShiftSuperAttribute()
    {
        return auth()->user()->designation->name == 'Shift Supervisor';
    }

    public function getIsAssignedShiftSuperAttribute()
    {
        $now = Carbon::now();
        $schedule = Schedule::where('user_id', auth()->user()->id)->where('date', $now->copy()->toDateString())->first();

        if ($schedule == null) {
            return false;
        }

        $start = Carbon::parse($schedule->date.' '.$schedule->start);
        $end = Carbon::parse($schedule->date.' '.$schedule->end);

        if ($now <= $start || $now >= $end || !$schedule->shift_super) {
            return false;
        }

        return true;
    }

    public function getHasUnitAccessAttribute()
    {
        return $this->roles->first()->id >= 5;
    }

    public function getHasGroupAccessAttribute()
    {
        return $this->roles->first()->id <= 4;
    }

    public function approvedOvertime($date)
    {
        dd($this->log, $date);
        $overtime = $this->log->where('date', $date)->overtime->first();
        if ($overtime == null) {
            return 0;
        }

        if ($overtime->action > 0) {
            return floor($overtime->minutes / 60).':'.($overtime->minutes % 60);
        }

        return 0;
    }

    public function approvedOvertimes($start, $end)
    {
        $logs = $this->log->where('date', '>=', $start)->where('date', '<=', $end);
        $total = 0;

        foreach($logs as $log) {
            if (!is_null($log->overtime)) {
                if ($log->overtime->action > 0) {
                    $total = $total + $log->overtime->minutes;
                }
            }
        }

        return floor($total / 60).':'.($total % 60);
    }
}
