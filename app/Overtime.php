<?php

namespace App;
use App\User;

use Illuminate\Database\Eloquent\Model;

class Overtime extends Model
{
    public function user ()
    {
        return $this->belongsTo('App\User');
    }
}
