<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log;
use App\User;
use App\Branch;
use App\Schedule;
use App\AllRequest;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function viewLoggedIn (Request $request)
    {
        $now = new Carbon;
        $date = $now->format('Y-m-d');
        $roles = auth()->user()->roles;
        $user_role = '';
        foreach ($roles as $role) {
            $user_role = $role->name;
        }

        if ($user_role == 'braista') {
            return redirect('/dashboard')->with('error', 'You are not authorized to access this page');
        }

        if ($user_role == 'manager') {
            $log = Log::where('date', $date)->where('branch_id', auth()->user()->branch_id)->whereNull('end')->get();
            $lists = array();

            if (count($log) != 0) {
                $lists = $this->listMaker($log, $lists, $date);
            }

            //Return a view with all those logged into that branch
            return view('logged-in')->with('lists', $lists)->with('value', false);
        } elseif (auth()->user()->roles->first() == 'admin' || $user_role == 'owner' || $user_role == 'super-admin') {
            $log = Log::where('date', $date)->whereNull('end')->get();
            $lists = array();

            if (count($log) != 0) {
                $lists = $this->listMaker($log, $lists, $date);
            }

            //Return a view with all those logged in all branch
            return view('logged-in')->with('lists', $lists)->with('value', false);
        } else {
            return redirect('/dashboard')->with('error', 'Sorry, you are not authorized to access this!');
        }
    }

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


        $hours = 'Please enter date range';
        $lates = 'Nothing';

        if ($request->start_date != null) {
            $hours = 0;
            $lates = 0;
            $start = Carbon::parse($request->start_date)->format('Y-m-d');
            $end = Carbon::parse($request->end_date)->format('Y-m-d');

            if ($start > $end) {
                return redirect('/view/employee/'.$user->id)->with('error', 'Invalid Date Range!!');
            }

            if ($end == null) {
                $now = new Carbon;
                $end = $now->format('Y-m-d');
            }

            $logs = Log::where('date', '>=', $start)->where('date', '<=', $end)
            ->where('user_id', $id)->whereNotNull('punch_out_difference')->get();

            foreach ($logs as $log) {
                $schedule = Schedule::where('date', $log->date)->where('user_id', $id)->first();
                $in_time = Carbon::parse($schedule->start);
                $out_time = Carbon::parse($schedule->end);
                
                $diff = (-1) * $log->punch_in_difference;
                $in_time->addSeconds($diff);

                $diff = (-1) * $log->punch_out_difference;
                $out_time->addSeconds($diff);
                
                $hours += $in_time->diffInMinutes($out_time);

                if ($log->is_late) {
                    $lates++;
                }
            }
        }
        
        if ($role == 'super-admin' || $role == 'owner' || $role == 'manager' || $role == 'admin') {
            return view('show')->with('user', $user)
            ->with('hours', $hours)
            ->with('lates', $lates)
            ->with('today', $today);
        } else {
            return redirect('/')->with('error', 'You are not authorized.');
        }
    }

    public function request ()
    {
        $role = auth()->user()->roles->first()->name;
        $request = '';
        $flow = 'null';

        if ($role == 'manager' || $role == 'super-admin') {
            $requests = AllRequest::whereNull('manager_approved')->whereNotNull('start')->
            where('branch_id', auth()->user()->branch_id)->orderBy('id', 'desc')->get();
            $flow = 'manager';
        } elseif ($role == 'super-admin' || $role == 'owner' || $role == 'admin') {
            $requests = AllRequest::where('manager_approved', true)->whereNull('hr_approved')->
            whereNotNull('start')->orderBy('id', 'desc')->get();
            $flow = 'hr';
        } else {
            return redirect('/dashboard')->with('error', 'You are not authorized to access this page');
        }
        
        return view('view-requests')->with('requests', $requests)->with('flow', $flow);
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

        $req = AllRequest::where('id', $id)->first();
        
        if ($flow) {
            if ($request->status == 'approved') {
                $req->manager_approved = true;
                $req->save();
            } elseif ($request->status == 'declined') {
                $req->manager_approved = false;
                $req->save();
            }
        } elseif (!$flow) {
            if ($request->status == 'approved') {
                $req->hr_approved = true;
                $req->save();
            } elseif ($request->status == 'declined') {
                $req->hr_approved = false;
                $req->save();
            }
        }

        return redirect('/view/requests');
    }
}
