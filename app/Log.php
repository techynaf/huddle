<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\User;
use App\Branch;
use App\Schedule;
use App\Late;
use App\LogUpdate;
use App\Overtime;

class Log extends Model
{
    public function user ()
    {
        return $this->belongsTo('App\User');
    }

    public function branch ()
    {
        return $this->belongsTo('App\Branch');
    }

    public function schedule ()
    {
        return $this->belongsTo('App\Schedule');
    }

    public function late ()
    {
        return $this->hasOne('App\Late');
    }

    public function updates ()
    {
        return $this->hasMany('App\LogUpdate');
    }

    public function overtime()
    {
        return $this->hasOne('App\Overtime');
    }

    public function getWorkedMinutesAttribute()
    {
        $start = Carbon::parse($this->attributes['start']);
        $end = Carbon::parse($this->attributes['end']);

        return $start->diffInMinutes($end);
    }

    public function getApprovedMinutesAttribute()
    {
        if ($this->schedule_id == null || $this->schedule_id == 0) {
            return 0;
        }

        $start = Carbon::parse($this->schedule->start);
        $end = Carbon::parse($this->schedule->end);

        return $start->diffInMinutes($end);
    }

    public function getOnGovHolidayAttribute()
    {
        return (GovHoliday::where('starting', '<=', $this->schedule->date)->where('ending', '>=', $this->schedule->date)->whereIn('religion', ['all', lcfirst($this->user->religion)])->first() != null);
    }

    public function getWorkedOvertimeAttribute()
    {
        return ($this->workedMinutes > ($this->approvedMinutes + 20) || $this->onGovHoliday);
    }

    public function getOvertimeMinutesAttribute()
    {
        if ($this->onGovHoliday) {
            return $this->workedMinutes;
        }
        if ($this->workedOvertime) {
            return ($this->workedMinutes - $this->approvedMinutes);
        }

        return 0;
    }

    public function createOvertime()
    {
        $overtime = $this->overtime;

        if ($this->workedOvertime) {
            if ($overtime == null) {
                Overtime::create([
                    'log_id' => $this->attributes['id'],
                    'minutes' => $this->overtimeMinutes,
                ]);
            } else {
                $overtime->minutes = $this->overtimeMinutes;
                $overtime->save();
            }
        } else {
            if ($overtime != null) {
                $overtime->delete();
            }
        }

        return;
    }
}
