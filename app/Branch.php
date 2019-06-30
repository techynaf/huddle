<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Schedule;
use App\Log;
use App\Late;

class Branch extends Model
{
    public function users ()
    {
        return $this->hasMany('App\User');
    }

    public function schedules ()
    {
        return $this->hasMany('App\Schedule');
    }

    public function logs ()
    {
        return $this->hasMany('App\Log');
    }

    public function lates ()
    {
        return $this->hasMany('App\Late');
    }

    public function parent()
    {
        return $this->belongsTo('App\Branch', 'parent_id');
    }

    public function children()
    {
        return $this->hasMany('App\Branch', 'parent_id');
    }

    public function level()
    {
        return $this->belongsTo('App\BranchLevel', 'level_id');
    }

    public function leaveStatuses()
    {
        return $this->hasMany('App\LeaveStatus');
    }

    public function getAncestorsAttribute()
    {
        $ancestors = [];

        while ($parent->parent !== null) {
            $parent = $this->parent;
            array_push($ancestors, $parent);
        }

        return $ancestors;
    }

    public function getDescendentAttribute()
    {
        $children = $this->children;
        $descendents = array($this->attributes['id']);

        if (count($children) > 0) {
            foreach ($children as $child) {
                $returnee = $child->descendent;

                if (is_array($returnee)) {
                    $descendents = array_merge($descendents, $returnee);
                }
            }
        }

        return $descendents;
    }

    public function getEmployeesAttribute()
    {
        return User::whereIn('branch_id', $this->descendent)->get();
    }
}
