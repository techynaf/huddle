<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Leave;

class LeaveTypes extends Model
{
    public function leaves ()
    {
        return $this->hasMany('App\Leave');
    }
}
