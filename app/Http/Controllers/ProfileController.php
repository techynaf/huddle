<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\AllRequest;
use App\Schedule;
use App\Log;
use App\Role;
use App\Branch;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRole;

class ProfileController extends Controller
{
    public function index ()
    {
        if(auth()->user() == null) {
            return redirect('/')->with('error', 'Please login');
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
        $user = auth()->user();
        $schedules = Schedule::where('user_id', $user->id)->where('date', '>=', $startDate)->
        where('date', '<=', $endDate)->get();
        $requests = AllRequest::where('user_id', $user->id)->where('is_removed', false)->orderBy('id', 'desc')->get();
        $logs = Log::where('user_id', $user->id)->where('date', '>=', $monthStart)->
        where('date', '<=', $monthEnd)->get();
        
        $flow = false;
        $lateCount = 0;
        $lateTime = 0;
        $earlyLeave = 0;
        $earlyTime = 0;

        if (count($logs) != 0) {
            foreach ($logs as $log) {
                if ($log->is_late) {
                    $lateCount++;
                    $lateTime += $log->punch_in_difference;
                }

                if ($log->punch_out_difference > 0) {
                    $earlyLeave++;
                    $earlyTime += $log->punch_out_difference;
                }
            }

            $lateTime = $lateTime * (-1);
            $lateTime = gmdate('i', $lateTime);
            $earlyTime = gmdate('i', $earlyTime);
            $flow = true;
        }

        $analytics = array($lateCount, $lateTime, $earlyLeave, $earlyTime);

        return view('dashboard')->with('user', $user)->with('requests', $requests)->with('flow', $flow)->
        with('schedules', $schedules)->with('days', $days)->with('analytics', $analytics);
    }

    public function create ()
    {
        foreach (auth()->user()->roles as $role){
            if ($role->name == 'manager' || $role->name == 'barista') {
                return redirect('/dashboard')->with('error', 'You are not authorized to access this');
            }
        }
       

        $roles = Role::all();
        $rs = array();
        $r = array('Owner', 'Admin', 'Manager', 'Barista', 'Super-admin');
        $i = 0;
        foreach ($roles as $role) {
            $composite = array($r[$i], $role->id);
            array_push($rs, $composite);
            $i++;
        }
        $branches = Branch::all();

        return view('create-profile')->with('branches', $branches)->with('roles', $rs);
    }

    public function store (Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'branch' => 'required',
            'role' => 'required',
            'address' => 'required',
            'religion' => 'required',
            'date' => 'required',
            'id' => 'required',
            'category' => 'required',
            'status' => 'required',
        ]);

        $pin = 0;

        while (true) {
            $pin = rand(1000, 9999);
            $check = User::where('pin', $pin)->get();

            if (count($check) == 0) {
                break;
            }
        }

        $user = new User;
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->branch_id = $request->branch;
        $user->address = $request->address;
        $user->pin = $pin;
        $user->password = bcrypt($pin);
        $user->logged_in = null;
        $user->joining_date = $request->date;
        $user->category = $request->category;
        $user->status = $request->status;
        $user->employee_id = $request->id;
        $user->religion = $request->religion;
        $role = Role::find($request->role);
        $user->save();
        $user->roles()->attach($role);
        $message = 'Profile created! The pin and password for the profile is '.$pin.'.';

        return redirect('/dashboard')->with('success', $message);
    }
}
