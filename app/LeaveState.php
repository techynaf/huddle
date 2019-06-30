<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeaveState extends Model
{
    protected $guarded = [];

    public function leave()
    {
        return $this->belongsTo('App\Leave');
    }

    public function actionBy()
    {
        return $this->belongsTo('App\User');
    }

    public function branch()
    {
        return $this->belongsTo('App\Branch');
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function getApplicantAttribute()
    {
        return $this->leave->user->name;
    }

    public function getLeaveTypeAttribute()
    {
        return $this->leave->leaveType->name;
    }

    public function getLeaveCountAttribute()
    {
        $count = Carbon::parse($this->attributes['start'])->diffInDays(Carbon::parse($this->attributes['end'])) + 1;

        if ($this->attributes['start_half'] || $this->attributes['end_half']) {
            $count -= 0.5 * ($this->attributes['start_half'] + $this->attributes['end_half']);
        }

        return $count;
    }

    public function getLeaveReasonAttribute()
    {
        return $this->leave->comment;
    }
}
