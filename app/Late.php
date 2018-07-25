<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Log;
use App\User;
use App\Branch;

class Late extends Model
{
    public function user ()
    {
        return $this->belongsTo('App\User');
    }

    public function alteredBy ()
    {
        return $this->belongsTo('App\User', 'altered_by');
    }

    public function log ()
    {
        return $this->belongsTo('App\Log');
    }

    public function branch ()
    {
        return $this->belongsTo('App\Branch');
    }
}
