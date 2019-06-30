<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\LeaveTypes;
use Carbon\Carbon;

class Leave extends Model
{
    protected $guarded = [];
    
    public function user ()
    {
        return $this->belongsTo('App\User');
    }

    public function leavetype ()
    {
        return $this->belongsTo('App\LeaveTypes', 'type');
    }

    public function statuses()
    {
        return $this->hasMany('App\LeaveState');
    }

    public function getLeaveCountAttribute()
    {
        $count = Carbon::parse($this->attributes['start'])->diffInDays(Carbon::parse($this->attributes['end'])) + 1;
        
        if ($this->attributes['start_is_half'] || $this->attributes['end_is_half']) {
            $count -= 0.5 * ($this->attributes['start_is_half'] + $this->attributes['end_is_half']);
        }

        return $count;
    }
}
