<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Branch;
use App\Schedule;
use App\Late;

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
}
