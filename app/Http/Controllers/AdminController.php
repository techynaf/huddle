<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log;
use App\User;
use App\Branch;
use App\Schedule;
use App\Leave;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function listMaker ($log, $lists, $date)
    {
        foreach ($log as $value) {
            $name = $value->user->name;
            $roles = $value->user->roles;
            $user_role = '';

            foreach ($roles as $role) {
                $user_role = $role->name;
            }

            $schedule = Schedule::where('date', $value->date)->where('user_id', $value->user_id)->first();
            $branch = $value->branch->name;
            
            $logoutTime = Carbon::parse($schedule->end)->format('H:i');
            $sTime = Carbon::parse($schedule->start);

            array_push($lists, array($name, $user_role, $value->start, $logoutTime, $date, $branch));
        }

        return $lists;
    }

    public function showAll ()
    {
        $role = auth()->user()->roles->first()->name;

        if ($role == 'super-admin' || $role == 'owner') {
            $users = User::all();
            $branches = Branch::all();
            $role = 'owner';

            return view('show-all')->with('users', $users)->with('role', $role);
        } elseif ($role == 'manager') {
            $branch = Branch::where('id', auth()->user()->branch_id)->first();
            $users = User::where('branch_id', auth()->user()->branch_id)->get();
            $role = 'manager';

            return view('show-all')->with('users', $users)->with('role', $role);
        }else {
            return redirect('/dashboard')->with('error', 'Sorry, you are not authorized to access this!');
        }
    }

    public function show (Request $request, $id)
    {
        $now = new Carbon;
        $today = $now->format('d-m-Y');
        $user = User::where('id', $id)->first();

        $role = auth()->user()->roles->first()->name;

        if ($role == 'barista') {
            return redirect('/')->with('error', 'You are not authorized.');
        }


        $now = new Carbon;

        while ($now->copy()->format('l') != 'Sunday') {
            $now = $now->copy()->subDay();
        }

        $month_start = $now->copy()->format('Y-m');
        $month_start = Carbon::parse($month_start.'-1');
        $month_end = $month_start->copy()->addMonth()->subDay();
        $logs = Log::where('user_id', $user->id)->where('date', '>=', $month_start)->
        where('date', '<=', $month_end)->get();

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
        with('days', $days)->with('logs', $logs)->with('hours', $hours)->with('minutes', $minutes);
    }

    public function request ()
    {
        $user = auth()->user();

        if ($user->roles->first()->name == 'barista') {
            return redirect('/dashboard')->with('error', 'You are not authorized to access this view');
        }

        $leaves = Leave::where('branch_id', $user->branch->id)->whereNull('approved')->get();

        dd($leaves);
    }
}
