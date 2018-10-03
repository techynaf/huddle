<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Session;
use Carbon\Carbon;
use App\Leave;
use App\WeeklyLeave;
use App\Late;
use App\Log;
use App\Managers;
use App\LogUpdate;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function managerLogin (Request $request)
    {
        $manager = auth()->user()->manager;

        if ($manager->pin != $request->pin) {
            return view('profile/manager')->with('error', 'Manager pin does not match with our records');
        }

        $manager->logged_in = true;
        $manager->save();

        return redirect('/scheduler');
    }

    public function managerLogout ()
    {
        $manager = auth()->user()->manager;
        $manager->logged_in = false;
        $manager->save();
        auth()->logout();

        return redirect('/');
    }

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

            if (auth()->user()->roles->first()->name == 'assistant-manager' || auth()->user()->roles->first()->name == 'manager') {
                $manager = auth()->user()->manager;

                if ($manager->logged_in == false) {
                    return view ('profile/manager');
                }
            }

            if (auth()->user()->roles->first()->name == 'district-manager' || auth()->user()->roles->first()->name == 'super-admin') {
                $leaves = Leave::where('is_approved', 0)->get();
                $weekly = WeeklyLeave::where('approved', 0)->get();
                $logs = Log::whereNull('end')->get();
                $lates = Late::whereNull('altered_by')->get();

                $mleave = false;
                $mweekly = false;
                $mlog = false;
                $mlate = false;

                foreach ($leaves as $leave) {
                    if ($leave->user->roles->first()->name == 'manager' || $leave->user->roles->first()->name == 'assistant-manager') {
                        $mleave = true;
                        break;
                    }
                }

                foreach ($weekly as $w) {
                    if ($w->user->roles->first()->name == 'manager' || $w->user->roles->first()->name == 'assistant-manager') {
                        $mweekly = true;
                        break;
                    }
                }

                foreach ($logs as $log) {
                    if ($log->user->roles->first()->name == 'manager' || $log->user->roles->first()->name == 'assistant-manager') {
                        $mlog = true;
                        break;
                    }
                }

                foreach ($lates as $late) {
                    if ($late->user->roles->first()->name == 'manager' || $late->user->roles->first()->name == 'assistant-manager') {
                        $mlate = true;
                        break;
                    }
                }

                array_push($notification, $mleave);
                array_push($notification, $mweekly);
                array_push($notification, $mlog);
                array_push($notification, $mlate);
            } else {
                $leaves = Leave::where('branch_id', auth()->user()->branch_id)->where('is_approved', 0)->get();
                $weeklies = WeeklyLeave::where('branch_id', auth()->user()->branch_id)->where('approved', 0)->get();
                $logs = Log::where('branch_id', auth()->user()->branch_id)->whereNull('end')->get();
                $lates = Late::where('branch_id', auth()->user()->branch_id)->whereNull('altered_by')->get();
                $bleave = false;
                $bweekly = false;
                $blog = false;
                $blate = false;


                foreach ($leaves as $leave) {
                    if ($leave->user->roles->first()->name == 'barista' || $leave->user->roles->first()->name == 'shift-supervisor') {
                        $bleave = true;
                        break;
                    }
                }

                foreach ($weeklies as $weekly) {
                    if ($weekly->user->roles->first()->name == 'barista' || $weekly->user->roles->first()->name == 'shift-supervisor') {
                        $bweekly = true;
                        break;
                    }
                }

                foreach ($logs as $log) {
                    if ($log->user->roles->first()->name == 'barista' || $log->user->roles->first()->name == 'shift-supervisor') {
                        $blog = true;
                        break;
                    }
                }

                foreach ($lates as $late) {
                    if ($late->user->roles->first()->name == 'barista' || $late->user->roles->first()->name == 'shift-supervisor') {
                        $blate = true;
                        break;
                    }
                }

                array_push($notification, $bleave);
                array_push($notification, $bweekly);
                array_push($notification, $blog);
                array_push($notification, $blate);
            }

            return $notification;
        }
    }

    public function findWeeks () {
        $date = $this->findSun(new Carbon);
        $dates = array();
        $s = $date;
        $e = $s->copy()->addDays(6);

        for ($i = -1; $i <= 2; $i++) {
            $d = array($s->copy()->addWeeks($i)->format('d-m-Y'), $e->copy()->addWeeks($i)->format('d-m-Y'));
            array_push($dates, $d);
        }

        return $dates;
    }

    public static function manager ()
    {
        $role = auth()->user()->roles->first()->name;

        if ($role == 'manager' || $role == 'assistant-manager') {
            return true;
        } else {
            return false;
        }
    }

    public static function dm ()
    {
        $role = auth()->user()->roles->first()->name;

        if ($role == 'district-manager') {
            return true;
        } else {
            return false;
        }
    }

    public static function hr ()
    {
        $role = auth()->user()->roles->first()->name;

        if ($role == 'HR') {
            return true;
        } else {
            return false;
        }
    }

    public static function superAdmin ()
    {
        $role = auth()->user()->roles->first()->name;

        if ($role == 'super-admin') {
            return true;
        } else {
            return false;
        }
    }
    
    public static function barista ()
    {
        $role = auth()->user()->roles->first()->name;

        if ($role == 'barista' || $role == 'shift-supervisor' || $role == 'employee') {
            return true;
        } else {
            return false;
        }
    }
}
