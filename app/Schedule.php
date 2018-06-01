<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Branch;

class Schedule extends Model
{
    protected $guarded = [];
    
    public function user ()
    {
        return $this->belongsTo('App\User');
    }

    public function branch ()
    {
        return $this->belongsTo('App\Branch');
    }
}
