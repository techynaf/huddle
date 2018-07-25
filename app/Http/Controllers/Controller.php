<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Carbon\Carbon;
use App\Leave;
use App\WeeklyLeave;
use App\Late;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function findSun ($date)
    {
        if ($date == null) {
            $date = new Carbon;
        }

        if ($date->copy()->format('l') == 'Sunday') {
            return $date;
        }

        while ($date->copy()->format('l') != 'Sunday') {
            $date = $date->addDays(-1);
        }

        return $date;
    }

    public function findSat ($date)
    {
        if ($date == null) {
            $date = new Carbon;
        }

        if ($date->copy()->format('l') == 'Saturday') {
            return $date;
        }

        while ($date->copy()->format('l') != 'Saturday') {
            $date = $date->addDays(1);
        }

        return $date;
    }

    public function checkNotifications ()
    {
        if (auth()->user() != null) {
            $notification = array();

            if (auth()->user()->roles->first()->name == 'district-manager' || auth()->user()->roles->first()->name == 'super-admin') {
                $leaves = Leave::where('is_approved', 0)->get();
                $weekly = WeeklyLeave::where('approved', 0)->get();
                
                if (count($leaves) != 0) {
                    array_push($notification, true);
                } else {
                    array_push($notification, false);
                }
    
                if (count($weekly) != 0) {
                    array_push($notification, true);
                } else {
                    array_push($notification, false);
                }
            } else {
                $leaves = Leave::where('branch_id', auth()->user()->branch_id)->where('is_approved', 0)->get();
                $weeklies = WeeklyLeave::where('branch_id', auth()->user()->branch_id)->where('approved', 0)->get();
                $bw = false;
                $bl = false;

                foreach ($leaves as $leave) {
                    if ($leave->user->roles->first()->name == 'barista') {
                        $bl = true;
                        break;
                    }
                }

                foreach ($weeklies as $weekly) {
                    if ($weekly->user->roles->first()->name == 'barista') {
                        $bw = true;
                        break;
                    }
                }

                if ($bl) {
                    array_push($notification, true);
                } else {
                    array_push($notification, false);
                }
    
                if ($bw) {
                    array_push($notification, true);
                } else {
                    array_push($notification, false);
                }
            }

            return $notification;
        }
    }

    public function findWeeks () {
        $date = $this->findSun(new Carbon);
        $dates = array();
        $s = $date;
        $e = $s->copy()->addDays(6);

        for ($i = -4; $i <= 4; $i++) {
            $d = array($s->copy()->addWeeks($i)->format('d-m-Y'), $e->copy()->addWeeks($i)->format('d-m-Y'));
            array_push($dates, $d);
        }

        return $dates;
    }
}
