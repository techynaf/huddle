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
        $users = User::all();
        $filters = Branch::all();
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

        $schedules = Schedule::where('date', '>=', $dates[0])->where('date', '<=', $dates[6])->get();

        return view('home')->with('users', $users)->with('branches', $branches)->with('days', $this->days)->
        with('filters', $filters)->with('flow', false)->with('schedules', $schedules)->with('dates', $dates);
    }
}
