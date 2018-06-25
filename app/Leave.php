<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\LeaveType;

class Leave extends Model
{
    public function user ()
    {
        return $this->belongsTo('App\User');
    }

    public function leavetype ()
    {
        return $this->belongsTo('App\LeaveTypes');
    }
}
