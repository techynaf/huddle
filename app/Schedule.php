<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Branch;

class Schedule extends Model
{
    protected $guarded = [];
    protected $table = 'schedules';
    
    public function user ()
    {
        return $this->belongsTo('App\User');
    }

    public function branch ()
    {
        return $this->belongsTo('App\Branch');
    }

    public function statingBranch()
    {
        return $this->belongsTo('App\Branch', 'start_branch');
    }

    public function endingBranch()
    {
        return $this->belongsTo('App\Branch', 'end_branch');
    }
}
