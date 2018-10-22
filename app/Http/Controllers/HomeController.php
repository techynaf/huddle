<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Branch;
use App\User;
use App\Schedule;
use Carbon\Carbon;
use Validator;
use Session;

class HomeController extends Controller
{
    private $days = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');

    public function index()
    {
        $branches = Branch::all();

        return $this->homeView($branches);
    }

    public function branchFilter (Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
        ]);

        if ($request->id == 'all') {
            return redirect('/');
        }

        $branch = Branch::where('id', $request->id)->get();
        
        return $this->homeView($branch);
    }

    public function homeView($branches)
    {
        $notification = $this->checkNotifications();

        if (auth()->user() != null) {
            if (!is_array($notification)) {
                return view('profile/manager');
            }
        }
        
        $users = null;
        $filters = Branch::all();

        if (count($branches) == 1) {
            $users = User::where('branch_id', $branches[0]->id)->get();
            $filters = Branch::where('id', '!=', $branches[0]->id)->get();
        } else {
            $users = User::all();
        }

        
        $now = new Carbon;
        $dates = array();

        while ($now->copy()->format('l') != 'Sunday') {
            $now = $now->addDays(-1);
        }

        array_push($dates, $now->copy()->format('Y-m-d'));
        $now = $now->addDay();

        while ($now->copy()->format('l') != 'Sunday') {
            array_push($dates, $now->copy()->format('Y-m-d'));
            $now = $now->addDay();
        }

        $schedules = array();

        foreach ($users as $user) {
            $ss = array();

            foreach ($dates as $date) {
                $s = Schedule::where('user_id', $user->id)->where('date', $date)->first();
                array_push($ss, $s);
            }

            array_push($schedules, $ss);
        }

        return view('home')->with('users', $users)->with('branches', $branches)->with('days', $this->days)->
        with('filters', $filters)->with('flow', false)->with('schedules', $schedules)->with('dates', $dates)->
        with('notification', $notification);
    }

    public function print (Request $request)
    {
        if ($request->id == null) {
            $branches = Branch::all();

            return view('schedule/branch-select')->with('branches', $branches)->with('notification', $this->checkNotifications());
        } else {
            $sun = $this->findSun(null);
            $dates = array($sun->copy()->format('Y-m-d'));
            $sun->addDay();

            if ($request->id == 'all') {
                $branches = Branch::all();
            } else {
                $branches = Branch::where('id', $request->id)->get();
            }

            $notification = $this->checkNotifications();

            if (auth()->user() != null) {
                if (!is_array($notification)) {
                    return view('profile/manager');
                }
            }
            
            $now = new Carbon;

            while ($now->copy()->format('l') != 'Sunday') {
                $now->addDays(-1);
            }

            $dates = array();
            array_push($dates, $now->copy());
            $now->addDay();

            while ($now->copy()->format('l') != 'Sunday') {
                array_push($dates, $now->copy());
                $now = $now->addDay();
            }

            return view('schedule/print')->with('branches', $branches)->with('dates', $dates)->with('notification', $notification);
        }
    }
}
