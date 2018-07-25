<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Branch;
use App\Schedule;
use App\Log;
use App\Role;
use App\Leave;
use App\NoSchedule;
use App\Late;
use App\ScheduleEdit;
use App\LogUpdate;

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
        return $this->hasMany('App\Leave');
    }

    public function roles ()
    {
        return $this->belongsToMany('App\Role');
    }

    public function schedule ()
    {
        return $this->hasMany('App\Schedule');
    }

    public function noSchedule ()
    {
        return $this->hasMany('App\NoSchedule');
    }

    public function disabledBy ()
    {
        return $this->hasMany('App\NoSchedule', 'manager_id');
    }

    public function lates ()
    {
        return $this->hasMany('App\Late');
    }

    public function approved ()
    {
        return $this->hasMany('App\Late', 'altered_by');
    }

    public function edited ()
    {
        return $this->hasMany('App\LogUpdate');
    }
}
