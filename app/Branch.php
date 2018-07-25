<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Schedule;
use App\Log;
use App\Late;

class Branch extends Model
{
    public function users ()
    {
        return $this->hasMany('App\User');
    }

    public function schedules ()
    {
        return $this->hasMany('App\Schedule');
    }

    public function logs ()
    {
        return $this->hasMany('App\Log');
    }

    public function lates ()
    {
        return $this->hasMany('App\Late');
    }
}
