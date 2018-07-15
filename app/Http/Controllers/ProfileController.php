<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Leave;
use App\Schedule;
use App\Log;
use App\Role;
use App\Branch;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Traits\HasRole;
use QRCode;

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

        $dates = array($now->copy()->format('Y-m-d'));
        $now = $now->addDay();

        while ($now->copy()->format('l') != 'Sunday') {
            array_push($dates, $now->copy()->format('Y-m-d'));
            $now = $now->addDay();
        }

        $days = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
        $user = auth()->user();
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

        $path = 'qrcodes/'.$user->pin.'.png';

        return view('dashboard')->with('user', $user)->with('requests', $requests)->with('schedules', $schedules)->
        with('days', $days)->with('logs', $logs);
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

        return view('profile/create')->with('branches', $branches)->with('roles', $rs);
    }

    public function store (Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'branch' => 'required',
            'role' => 'required',
            'e_id' => 'required',
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
        $user->branch_id = $request->branch;
        $user->pin = $pin;
        $user->password = bcrypt($pin);
        $user->logged_in = false;
        $user->employee_id = $request->e_id;
        $role = Role::find($request->role);
        $user->save();
        $user->roles()->attach($role);
        $message = 'Profile created! The pin and password for the profile is '.$pin.'.';
        $qrm = array($pin, $request->name, $request->e_id);

        return $this->pCard($qrm);
    }

    public function pCard ($qrm)
    {
        $pin = $qrm[0];
        $name = $qrm[1];
        $e_id = $qrm[2];
        $qr = QRCode::text($pin);
        $qr->setOutFile('qrcodes/'.$pin.'.png')->png();

        return view('profile-created')->with('pin', $pin)->with('name', $name)->with('e_id', $e_id);
    }

    public function idCard (Request $request)
    {
        if ($request->id == null) {
            return view ('test')->with('flow', false);
        } else {
            $user = User::where('id', $request->id)->first();

            return view('test')->with('user', $user)->with('flow', true);
        }
    }

    public function createQR () {
        $users = User::all();

        foreach ($users as $user) {
            $qr = QRCode::text($user->pin);
            $qr->setOutFile('qrcodes/'.$user->pin.'.png')->png();
        }

        return redirect('/')->with('success', 'QR Codes successfully generated');
    }

    public function logger ()
    {
        if (auth()->user() == null) {
            return redirect ('/login');
        } elseif (auth()->user()->roles->first()->name == 'manager' || auth()->user()->roles->first()->name == 'district-manager' || auth()->user()->roles->first()->name == 'super-admin') {
            return redirect ('/scheduler');
        } else {
            return redirect ('/');
        }
    }
}
