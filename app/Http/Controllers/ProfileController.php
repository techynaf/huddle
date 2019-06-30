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
use App\Managers;
use QRCode;
use App\Helper\LeavesHelper as LH;

class ProfileController extends Controller
{
    public function index ()
    {
        $notification = $this->checkNotifications();

        if (!is_array($notification)) {
            return view('profile/manager');
        }

        if(auth()->user() == null) {
            return redirect('/')->with('error', 'Please login');
        }

        $now = new Carbon;
        $user = auth()->user();

        while ($now->copy()->format('l') != 'Sunday') {
            $now = $now->copy()->subDay();
        }

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

                if ($actual->diffInMinutes($scheduled) >= 1) { //checks if the person is late or not, late factor is 10 mins
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
        $requests = Leave::where('user_id', $user->id)->where('is_removed', false)->orderBy('id', 'desc')->paginate(4);
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
        with('days', $days)->with('logs', $logs)->with('hours', $hours)->with('minutes', $minutes)->
        with('lates', $lates)->with('notification', $notification)->with('date', $this->findSun(null));
    }

    public function create ()
    {
        if ($this->manager() || $this->barista() || $this->dm()) {
            return redirect('/dashboard')->with('error', 'You are not authorized to access this');
        }
       
        $notification = $this->checkNotifications();

        if (!is_array($notification)) {
            return view('profile/manager');
        }

        $branches = Branch::all();
        $rs = Role::all();
        $roles = array();

        foreach($rs as $r) {
            if (!($r->name == 'super-admin' || $r->name == 'HR' || $r->name == 'district-manager')) {
                $x = array($r->id, ucfirst($r->name));
                array_push($roles, $x);
            }
        }

        return view('profile/create')->with('branches', $branches)->with('roles', $roles)->with('notification', $notification);
    }

    public function store (Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'branch' => 'required',
            'role' => 'required',
            'employee_id' => 'required',
            'religion' => 'required',
            'status' => 'required',
            'joining_date' => 'required',
            'designation' => 'required',
            'gender' => 'required',
        ]);

        $pin = 0;
        $role = Role::find($request->role);

        while (true) {
            $pin = rand(1000, 9999);
            $check = User::where('pin', $pin)->get();

            if (count($check) == 0) {
                break;
            }
        }

        if (count($role->designations->where('id', $request->designation)) == 0) {
            $this->validate($request, [
                'valid_designation' => 'required'
            ]);
        }

        if (User::where('employee_id', $request->employee_id)->first() != null) {
            $this->validate($request, [
                'valid_employee_id' => 'required'
            ]);
        }

        $user = new User;
        $user->name = $request->name;
        $user->status = $request->status;
        $user->branch_id = $request->branch;
        $user->pin = $pin;
        $user->password = bcrypt('bangladesh');
        $user->logged_in = false;
        $user->employee_id = $request->employee_id;
        $user->religion = $request->religion;
        $user->gender = $request->gender;
        $user->designation_id = $request->designation;
        $user->joining_date = $request->joining_date;
        $user->save();
        $user->roles()->attach($role);
        $message = 'Profile created! The pin and password for the profile is '.$pin.'.';
        $qr = QRCode::text($pin);
        $qr->setOutFile('qrcodes/'.$pin.'.png')->png();

        if ($role->id == 5) {
            while (true) {
                $pin = rand(1000, 9999);
                $check = Managers::where('pin', $pin)->get();
    
                if (count($check) == 0) {
                    break;
                }
            }

            $manager = new Managers;
            $manager->user_id = $user->id;
            $manager->pin = $pin;
            $manager->save();
        }

        $url = '/view/employee/'.$user->id;
        $helper = new LH;
        $helper->createBalance($user);

        return redirect($url);
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
        } elseif (auth()->user()->roles->first()->name == 'manager' || auth()->user()->roles->first()->name == 'assistant-manager' || auth()->user()->roles->first()->name == 'district-manager' || auth()->user()->roles->first()->name == 'super-admin') {
            if (auth()->user()->manager != null) {
                if (auth()->user()->manager->logged_in == false) {
                    return view ('profile/manager');
                }
            }

            return redirect ('/scheduler');
        } else {
            return redirect ('/');
        }
    }

    public function edit (Request $request, $id)
    {
        if ($this->manager() || $this->barista() || $this->dm()) {
            return redirect('/')->with('error', 'You are not authorized to access this view');
        }
        
        $notification = $this->checkNotifications();

        if (!is_array($notification)) {
            return view('profile/manager');
        }

        $user = User::where('id', $id)->first();
        $branches = Branch::all();
        $rs = Role::all();
        $roles = array();

        foreach($rs as $r) {
            if ($r->name != 'super-admin' || $r->name != 'HR') {
                $x = array($r->id, ucfirst($r->name));
                array_push($roles, $x);
            }
        }


        return view('profile/edit')->with('user', $user)->with('branches', $branches)->with('roles', $roles)->
        with('notification', $notification);
    }

    public function update (Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        $role = Role::where('id', $request->role)->first();

        $userR = $user->roles->first()->name;
        $barista = ($role->name == 'barista' || $role->name == 'shift-supervisor' || $role->name == 'employee');
        $manager = ($role->name == 'manager' || $role->name == 'assistant-manager');
        $userB = ($userR == 'barista' || $userR == 'shift-supervisor' || $userR == 'employee');
        $userM = ($userR == 'manager' || $userR == 'assistant-manager');
        $pin = 0;
        $religion = null;

        if (($barista && $userB) || ($manager && $userM)) {
            $pin = $user->pin;
        } elseif ($userB && $manager) {
            while (true) {
                $pin = rand(1000, 9999);
                $check = User::where('pin', $pin)->get();
    
                if (count($check) == 0) {
                    break;
                }
            }

            $manager = new Managers;
            $manager->pin = $pin;
            $manager->user_id = $user->id;
            $manager->save();
        } elseif ($userM && $barista) {
            $manager = xs::where('user_id', $user->id)->first();
            $manager->delete();
        }


        if ($request->religion == 'Other') {
            if ($request->other == null) {
                $religion = 'Other';
            } else {
                $religion = $request->other;
            }
        } else {
            $religion = $request->religion;
        }

        $user->name = $request->name;
        $user->status = $request->status;
        $user->employee_id = $request->employee_id;
        $user->branch_id = $request->branch;
        $user->religion = $religion;
        $user->save();
        $user->roles()->attach($role);
        $message = 'Profile updated! The pin and password for the profile is '.$pin.'.';
        $qr = QRCode::text($pin);
        $qr->setOutFile('qrcodes/'.$pin.'.png')->png();

        $user->roles()->detach($user->roles->first()->id);
        $user->roles()->attach($request->role);

        $url = '/view/employee/'.$user->id;

        return redirect($url)->with('success', $message);
    }

    public function delete (Request $request, $id)
    {
        $user = User::find($id);
        $user->branch_id = 0;
        $user->save();
        $url = '/view/employee/'.$id;

        return redirect($url)->with('success', 'Emplpoyee successfully deleted');
    }

    public function pin (Request $request, $id, $stat)
    {
        $user = User::find($id);
        $pin = rand(1000, 9999);

        if ($stat == 'false') {
            while (true) {
                $person = User::where('pin', $pin)->first();

                if ($person == null) {
                    break;
                }
                
                $pin = rand(1000, 9999);
            }

            $user->pin = $pin;
            $user->save();
        } elseif ($stat == 'super-admin' || $stat == 'district-manager' || $stat == 'HR') {
            $pin = rand(100000, 999999);

            while (true) {
                $person = User::where('pin', $pin)->first();

                if ($person == null) {
                    break;
                }

                $pin = rand(100000, 999999);
            }

            $user->pin = $pin;
            $user->save();
        } else {
            $manager = $user->manager;

            while (true) {
                $person = Managers::where('pin', $pin)->first();

                if ($person == null) {
                    break;
                }

                $pin = rand(1000, 9999);
            }

            $manager->pin = $pin;
            $manager->save();
        }

        $qr = QRCode::text($user->pin);
        $qr->setOutFile('qrcodes/'.$user->pin.'.png')->png();

        $url = '/view/employee/'.$id;

        return redirect($url)->with('success', 'New pin is '. $pin);
    }
}
