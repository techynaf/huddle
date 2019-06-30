<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Role extends Model
{
    public function user ()
    {
        return $this->belongsToMany('App\User');
    }

    public function leaveTypes()
    {
        return $this->hasMany('App\LeaveTypes');
    }

    public function leaveStatuses()
    {
        return $this->hasMany('App\LeaveStatus');
    }

    public function leavePolicies()
    {
        return $this->hasMany('App\LeavePolicy');
    }

    public function designations()
    {
        return $this->hasMany('App\Designation');
    }
}
