<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Overtime extends Model
{
    protected $guarded = [];

    public function log()
    {
        return $this->belongsTo('App\Log');
    }

    public function approvedBy()
    {
        return $this->belongsTo('App\User');
    }

    public function getUserAttribute()
    {
        return $this->log->user;
    }

    public function getSignInAttribute()
    {
        return Carbon::parse($this->log->start)->format('h:i a');
    }

    public function getSignOutAttribute()
    {
        return Carbon::parse($this->log->end)->format('h:i a');
    }

    public function getTotalWorkedAttribute()
    {
        return floor($this->log->workedMinutes / 60).':'.($this->log->workedMinutes % 60);
    }

    public function getHoursAttribute()
    {
        return floor($this->attributes['minutes'] / 60).':'.($this->attributes['minutes'] % 60);
    }

    public function getScheduledAttribute()
    {
        if (GovHoliday::where('starting', '<=', $this->log->schedule->date)->where('ending', '>=', $this->log->schedule->date)->whereIn('religion', ['all', lcfirst($this->user->religion)])->first() != null) {
            return '0:00 <br> ('.GovHoliday::where('starting', '<=', $this->log->schedule->date)->where('ending', '>=', $this->log->schedule->date)->whereIn('religion', ['all', lcfirst($this->user->religion)])->first()->name.')';
        }

        return floor($this->log->approvedMinutes / 60).':'.($this->log->approvedMinutes % 60);
    }
}
