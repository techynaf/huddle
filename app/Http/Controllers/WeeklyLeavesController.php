<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WeeklyLeave;
use App\User;
use Carbon\Carbon;

class WeeklyLeavesController extends Controller
{
    public function create ()
    {
        $days = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');
        $now = new Carbon;
        $start = $now->copy()->format('Y-m-d');
        $end = $now->addWeek()->format('Y-m-d');

        return view('create-weekly-leave')->with('days', $days)->with('start', $start)->with('end', $end);
    }
}
