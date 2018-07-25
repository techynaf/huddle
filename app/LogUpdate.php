<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Log;
use App\User;

class LogUpdate extends Model
{
    public function user ()
    {
        return $this->belongsTo('App\User');
    }

    public function log ()
    {
        return $this->belongsTo('App\Log');
    }
}
