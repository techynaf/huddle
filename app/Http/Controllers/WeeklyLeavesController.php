<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WeeklyLeave;
use App\User;
use Carbon\Carbon;
use Validator;
use Session;

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

    public function store (Request $request, $id)
    {
        $this->validate($request, [
            'day_1' => 'required',
            'day_2' => 'required',
            'start' => 'required',
            'end' => 'required',
        ]);

        //add checker of overlapping leaves
        $user = User::where('id', $id)->first();
        $start = Carbon::parse($request->start);
        $end = Carbon::parse($request->end);
        $day_1 = null;
        $day_2 = null;
        $counter = 0;

        for ($i = $start; $i <= $end; $i = $i->addDay()) {
            if ($request->day_1 == $i->copy()->format('l')) {
                $day_1 = $i->copy()->format('Y-m-d');
            }

            if ($request->day_2 == $i->copy()->format('l')) {
                $day_2 = $i->copy()->format('Y-m-d');
            }

            if ($counter != 0 && $counter % 7 == 0) {
                $leave = new WeeklyLeave;
                $leave->user_id = $user->id;
                $leave->date_1 = $day_1;
                $leave->date_2 = $day_2;
                $leave->clustered = true;
                $leave->approved = null;
                $leave->save();
            }
            $counter++;
        }

        return redirect('/dashboard')->with('success', 'Weekly day off successfully added, waiting for approval');
    }
}
