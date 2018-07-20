<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Schedule;
use App\User;

class ScheduleEdit extends Model
{
    public function user ()
    {
        return $this->belongsTo('App\User');
    }

    public function schedule ()
    {
        return $this->belongsTo('App\Schedule');
    }
}
