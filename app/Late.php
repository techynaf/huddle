<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Log;
use App\User;

class Late extends Model
{
    public function user ()
    {
        return $this->hasOne('App\User');
    }

    public function alteredBy ()
    {
        return $this->hasOne('App\User', 'altered_by');
    }

    public function log ()
    {
        return $this->hasOne('App\Log');
    }
}
