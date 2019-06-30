<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BranchLevel extends Model
{
    public function branches()
    {
        return $this->hasMany('App\Branch', 'level_id');
    }
}
