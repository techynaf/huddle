<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LeavePolicy extends Model
{
    protected $guarded = [];

    public function leaveType()
    {
        return $this->belongsTo('App\LeaveTypes', 'leave_type_id');
    }

    public function role()
    {
        return $this->belongsTo('App\Role');
    }
}
