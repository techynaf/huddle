<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log;
use App\User;
use App\Branch;
use App\Schedule;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function viewLoggedIn (Request $request)
    {
        $now = new Carbon;
        $date = $now->format('Y-m-d');
        if(auth()->user() == null) {
            return redirect('/')->with('error', 'You are not authorized to access this page.');
        }
        $roles = auth()->user()->role;
        $user_role = '';
        foreach ($roles as $role) {
            $user_role = $role->name;
        }

        if ($user_role == 'manager') {
            $log = Log::where('date', $date)->where('branch_id', auth()->user()->branch_id)->whereNull('punch_out_difference')->get();
            $lists = array();
            $lists = $this->listMaker($log, $lists, $date);

            //Return a view with all those logged into that branch
            return view('logged-in')->with('lists', $lists)->with('value', false);
        } elseif (auth()->user()->role == 'admin' || $user_role == 'owner' || $user_role == 'super-admin') {
            $log = Log::where('date', $date)->whereNull('punch_out_difference')->get();
            $lists = array();
            $lists = $this->listMaker($log, $lists, $date);

            //Return a view with all those logged in all branch
            return view('logged-in')->with('lists', $lists)->with('value', false);
        } else {
            return redirect('/')->with('error', 'Sorry, you are not authorized to access this!');
        }
    }

    public function listMaker ($log, $lists, $date)
    {
        foreach ($log as $value) {
            $name = $value->user->name;
            $roles = $value->user->role;
            $user_role = '';
            foreach ($roles as $role) {
                $user_role = $role->name;
            }
            $schedule = Schedule::where('date', $value->date)->where('user_id', $value->user_id)->first();
            $branch = '';
            foreach ($log as $l) {
                $branch = $l->branch;
            }
            $logoutTime = $schedule->end;
            $sTime = Carbon::parse($schedule->start);

            if ($value->punch_in_difference < 0) {
                $diff = (-1) * $value->punch_in_difference;
                $loginTime = $sTime->addSeconds($diff);
            } else {
                $diff = $value->punch_in_difference;
                $loginTime = $sTime->subSeconds($diff);
            }

            array_push($lists, array($name, $user_role, $loginTime, $logoutTime, $branch));
        }

        return $lists;
    }

    public function showAll ()
    {
        $rs = auth()->user()->role;
        $role = '';

        foreach ($rs as $r) {
            $role = $r->name;
        }
        if ($role == 'super-admin' || $role == 'owner') {
            $users = User::all();
            $branches = Branch::all();
            $role = 'owner';

            return view('show-all')->with('users', $users)->with('role', $role);
        } elseif ($role == 'manager') {
            $branch = Branch::where('id', auth()->user()->branch_id)->first();
            $user = User::where('id', $id)->where('branch_id', auth()->user()->branch_id)->get();
            $role = 'manager';

            return view('show-all')->with('users', $users)->with('role', $role);
        }else {
            return redirect('/')->with('error', 'Sorry, you are not authorized to access this!');
        }
    }

    public function show (Request $request, $id)
    {
        $user = User::where('id', $id);
        
    }

    public function createSchedule (Request $request, $id)
    {
        $user = User::where('id', $id);
    }

    public function storeSchedule ()
    {
        
    }
}
