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
            $user = User::where('id', auth()->user()->id)->where('branch_id', auth()->user()->branch_id)->get();
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

        $yM = $now->copy()->format('Y-m');
        
        $monthStart = Carbon::parse($yM.'-1');
        $monthEnd = $monthStart->copy()->addMonth()->subDay()->format('Y-m-d');
        $monthStart = $monthStart->format('Y-m-d');
        $days = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
        $startDate = $now->format('Y-m-d');
        $endDate = $now->addDays(6)->format('Y-m-d');
        $schedules = Schedule::where('user_id', $user->id)->where('date', '>=', $startDate)->
        where('date', '<=', $endDate)->get();
        $requests = Leave::where('user_id', $user->id)->orderBy('id', 'desc')->get();
        $logs = array();

        foreach ($schedules as $schedule) {
            $l = Log::where('id', $user->id)->where('date', $schedule->date)->get();
            array_push($logs, $l);
        }

        $path = 'qrcodes/'.$user->pin.'.png';

        return view('show')->with('user', $user)->with('requests', $requests)->with('schedules', $schedules)->
        with('days', $days)->with('logs', $logs);
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

    public function requests ()
    {
        $role = auth()->user()->roles->first()->name;
        $request = '';
        $flow = 'null';

        if ($role == 'manager') {
            $requests = Leave::whereNull('is_approved')->whereNotNull('start')->
            where('branch_id', auth()->user()->branch_id)->orderBy('id', 'desc')->get();
            $flow = 'manager';
        } elseif ($role == 'super-admin' || $role == 'owner' || $role == 'admin') {
            $requests = Leave::where('is_approved', true)->whereNull('hr_approved')->
            whereNotNull('start')->orderBy('id', 'desc')->get();
            $flow = 'hr';
        } else {
            return redirect('/dashboard')->with('error', 'You are not authorized to access this page');
        }
        
        return view('view-requests')->with('requests', $requests)->with('flow', $flow);
    }

    public function r ()
    {
        if (auth()->user()->roles->first()->name == 'barista') {
            return redirect ('/')->with('error', 'You are not authorized to view the page');
        }

        $leaves = null;

        if (auth()->user()->roles->first()->name == 'manager') {
            $leaves = Leave::where('branch_id', auth()->user()->branch_id)->whereNull('is_approved');
        }
    }

    public function requestProcess (Request $request, $id)
    {
        $role = auth()->user()->roles->first()->name;

        if ($role == 'manager' || $role == 'super-admin') {
            $flow = true;
        } elseif ($role == 'owner' || $role == 'admin') {
            $flow = false;
        } else {
            return redirect('/dashboard')->with('error', 'You are not authorized to access this page');
        }

        $req = Leave::where('id', $id)->first();
        
        if ($flow) {
            if ($request->status == 'approved') {
                $req->is_approved = true;
                $req->save();
            } elseif ($request->status == 'declined') {
                $req->is_approved = false;
                $req->save();
            }
        } elseif (!$flow) {
            if ($request->status == 'approved') {
                $req->is_approved = true;
                $req->save();
            } elseif ($request->status == 'declined') {
                $req->is_approved = false;
                $req->save();
            }
        }

        return redirect('/view/requests');
    }
}
