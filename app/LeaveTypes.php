<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Leave;

class LeaveTypes extends Model
{
    protected $guarded = [];

    public function leaves ()
    {
        return $this->hasMany('App\Leave', 'type');
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function policies()
    {
        return $this->hasMany('App\LeavePolicy', 'leave_type_id');
    }

    public function leaveBalance()
    {
        return $this->hasMany('App\LeaveBalance', 'type');
    }
}
