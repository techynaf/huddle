<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class NoSchedule extends Model
{
    public function for ()
    {
        return $this->belongsTo('App\User');
    }

    public function assignedBy ()
    {
        return $this->belongsTo('App\User', 'manager_id');
    }
}
