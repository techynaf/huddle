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

    public function userFilter (Request $request)
    {
        $this->validate($request, [
            'id' => 'required',
        ]);

        $user = User::where('name', $request->name)->get();

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

        if (count($user) == 0) {
            return redirect('/')->with('error', 'There are no employee with name '.$request->name);
        } elseif (count($user) == 1) {
            $url = '/view/employee/'.$user->first()->id;
            
            return redirect($url);
        }
    }

    public function homeView($branches)
    {
        $notification = $this->checkNotifications();

        if (count($notification) == 1) {
            return view('profile/manager');
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
}
