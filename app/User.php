<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Branch;
use App\Schedule;
use App\Log;
use App\Role;
use App\Leave;
use App\Request;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function branch ()
    {
        return $this->belongsTo('App\Branch');
    }

    public function log ()
    {
        return $this->hasMany('App\Log');
    }

    public function leave ()
    {
        return $this->hasOne('App\Leave');
    }

    public function request ()
    {
        return $this->hasMany('App\Request');
    }

    public function role ()
    {
        return $this->belongsToMany('App\Role');
    }

    public function schedule ()
    {
        return $this->hasMany('App\Schedule');
    }
}
