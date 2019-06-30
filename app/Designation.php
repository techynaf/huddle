<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    public function role()
    {
        return $this->belongsTo('App\Role');
    }

    public function users()
    {
        return $this->hasMany('App\User');
    }
}
