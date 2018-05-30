<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Schedule;

class Branch extends Model
{
    public function user ()
    {
        return $this->hasMany('App\User');
    }

    public function schedule ()
    {
        return $this->hasMany('App\Schedule');
    }
}
