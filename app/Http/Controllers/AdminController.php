<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log;
use App\User;
use App\Branch;
use App\Schedule;
use App\Leave;
use App\Role;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function show (Request $request, $id)
    {
        $notification = $this->checkNotifications();
        $now = new Carbon;
        $user = User::where('id', $id)->first();

        $role = auth()->user()->roles->first()->name;

        if ($this->barista()) {
            return redirect('/')->with('error', 'You are not authorized.');
        }


        $now = $this->findSun(null);

        $start = $this->findSun(null)->format('Y-m-d');
        $end = $this->findSun(null)->addDays(6)->format('Y-m-d');
        $logs = Log::where('user_id', $user->id)->where('date', '>=', $start)->
        where('date', '<=', $end)->get();

        $minutes = 0;
        $hours = 0;

        foreach ($logs as $log) {
            if ($log->end != null) {
                $start = Carbon::parse($log->start);
                $end = Carbon::parse($log->end);
                $minutes += $start->diffInMinutes($end);
            }
        }

        $hours = floor($minutes / 60);
        $minutes = $minutes % 60;
        $lates = 0;

        $schedules = Schedule::where('user_id', $user->id)->where('date', '>=', $start)->
        where('date', '<=', $end)->get();

        foreach ($schedules as $schedule) {
            $log = Log::where('user_id', $user->id)->where('date', $schedule->date)->first();
            
            if ($log != null) {
                $scheduled = Carbon::parse($schedule->start);
                $actual = Carbon::parse($log->start);

                if ($actual->diffInMinutes($scheduled) >= 10) { //checks if the person is late or not, late factor is 10 mins
                    $lates++;
                }
            }
        }

        $dates = array($now->copy()->format('Y-m-d'));
        $now = $now->addDay();

        while ($now->copy()->format('l') != 'Sunday') {
            array_push($dates, $now->copy()->format('Y-m-d'));
            $now = $now->addDay();
        }

        $days = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
        $schedules = array();
        $requests = Leave::where('user_id', $user->id)->orderBy('id', 'desc')->get();
        $logs = array();

        foreach ($dates as $date) {
            $schedule = Schedule::where('user_id', $user->id)->where('date', $date)->first();
            array_push($schedules, $schedule);
        }

        foreach ($dates as $date) {
            $l = Log::where('user_id', $user->id)->where('date', $date)->get();
            array_push($logs, $l);
        }

        $path = '/'.'qrcodes/'.$user->pin.'.png';

        return view('dashboard')->with('user', $user)->with('requests', $requests)->with('schedules', $schedules)->
        with('days', $days)->with('logs', $logs)->with('hours', $hours)->with('minutes', $minutes)->
        with('lates', $lates)->with('notification', $notification);
    }

    public function branch (Request $request, $id)
    {
        if ($this->barista() || $this->manager()) {
            return redirect('/')->with('error', 'You are not authorized.');
        }

        $user = User::where('id', $id)->first();
        $url = '/branch/details/'.$user->branch_id;
        $message = null;

        if ($request->branch != null) {
            if ($this->hr()) {
                return redirect('/')->with('error', 'You are not authorized to make this change');
            } else {
                $user = User::where('id', $id)->first();
                $user->branch_id = $request->branch;
                $user->save();

                $message = 'Branch successfully changes!';
            }
        }

        if ($request->role != null) {
            if ($this->dm() || $this->barista() || $this->manager()) {
                return redirect('/')->with('error', 'You are not authorized to make this change');
            } else {
                $url = $url.'?flow=false';
                $role = Role::where('id', $request->role)->first();
                $userR = $user->roles->first()->name;
                $barista = ($role->name == 'barista' || $role->name == 'shift-supervisor');
                $manager = ($role->name == 'manager' || $role->name == 'assistant-manager');
                $userB = ($userR == 'barista' || $userR == 'shift-supervisor');
                $userM = ($userR == 'manager' || $userR == 'assistant-manager');
                $pin = 0;
                $religion = null;

                if (($barista && $userB) || ($manager && $userM)) {
                    $pin = $user->pin;
                } elseif ($userB && $manager) {
                    while (true) {
                        $pin = rand(100000, 999999);
                        $check = User::where('pin', $pin)->get();
            
                        if (count($check) == 0) {
                            break;
                        }
                    }
                } elseif ($userM && $barista) {
                    while (true) {
                        $pin = rand(1000, 9999);
                        $check = User::where('pin', $pin)->get();
            
                        if (count($check) == 0) {
                            break;
                        }
                    }
                }

                $user->pin = $pin;
                $user->save();
                $user->roles()->detach($user->roles->first()->id);
                $user->roles()->attach($request->role);

                $message = 'Profile role changed! New pin is '.$pin;
            }
        }

        return redirect($url)->with('success', $message);
    }
}
