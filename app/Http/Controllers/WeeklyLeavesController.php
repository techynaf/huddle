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
    private $days = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');

    public function create ()
    {
        $now = new Carbon;
        $start = $now->copy()->format('Y-m-d');
        $end = $now->addWeek()->format('Y-m-d');

        return view('create-weekly-leave')->with('days', $this->days)->with('start', $start)->with('end', $end);
    }

    public function store (Request $request, $id)
    {
        $this->validate($request, [
            'day_1' => 'required',
            'day_2' => 'required',
            'start' => 'required',
            'end' => 'required',
        ]);

        $start = Carbon::parse($request->start);
        $end = Carbon::parse($request->end);
        $leaves = WeeklyLeave::where('user_id', $id)->where('date_1', '>=', $start->copy()->format('Y-m-d'))->
        where('date_2', '<=', $end->copy()->format('Y-m-d'))->where('clustered', true)->get();

        if (count($leaves) != 0) {
            return redirect('/')->with('error', 'Weekly Leaves already exits for this date range, please use edit to change them');
        }

        $day_1 = null;
        $day_2 = null;
        $counter = 0;

        for ($i = $start; $i <= $end; $i = $i->addDay()) {
            if ($request->day_1 == $i->copy()->format('l')) {
                $day_1 = $i;
            }

            if ($request->day_2 == $i->copy()->format('l')) {
                $day_2 = $i;
            }

            if ($counter != 0 && $counter % 7 == 0) {
                $leave = new WeeklyLeave;
                $leave->user_id = $id;
                $leave->date_1 = $day_1->copy()->format('Y-m-d');
                $leave->date_2 = $day_2->copy()->format('Y-m-d');
                $leave->day_1 = $request->day_1;
                $leave->day_2 = $request->day_2;
                $leave->clustered = true;
                $leave->approved = null;
                $leave->save();
            }
            $counter++;
        }

        return redirect('/dashboard')->with('success', 'Weekly day off successfully added, waiting for approval');
    }

    public function edit ()
    {
        $now = new Carbon;

        return view('edit-weekly-leave')->with('start', $now->copy()->format('Y-m-d'))->
        with('end', $now->copy()->addWeek()->format('Y-m-d'))->with('days', $this->days);
    }

    public function update (Request $request, $id)
    {
        $this->validate($request, [
            'day_1' => 'required',
            'day_2' => 'required',
            'start' => 'required',
            'end' => 'required',
        ]);

        $user = User::where('id', $id)->first();
        $start = Carbon::parse($request->start);
        $end = Carbon::parse($request->end);

        $leaves = WeeklyLeave::where('user_id', $id)->where('date_1', '>=', $start->copy()->format('Y-m-d'))->
        where('date_2', '<=', $end->copy()->format('Y-m-d'))->get();

        if (count($leaves) == 0) {
            return redirect('/dashboard')->with('error', 'There are no scheduled off days in the date range.');
        }

        $day_1 = null;
        $day_2 = null;
        $counter = 0;
        $j = 0;

        for ($i = $start; $i <= $end; $i = $i->addDay()) {
            if ($request->day_1 == $i->copy()->format('l')) {
                $day_1 = $i;
            }

            if ($request->day_2 == $i->copy()->format('l')) {
                $day_2 = $i;
            }

            if ($j >= count($leaves)) {
                break;
            }

            if (($counter != 0 && $counter % 7 == 0)) {
                $leave = $leaves[$j];
                $leave->date_1 = $day_1->copy()->format('Y-m-d');
                $leave->date_2 = $day_2->copy()->format('Y-m-d');
                $leave->day_1 = $request->day_1;
                $leave->day_2 = $request->day_2;
                $leave->clustered = true;
                $leave->approved = null;
                $leave->save();
                $j++;
            }
            $counter++;
        }

        return redirect('/dashboard')->with('success', 'Weekly day off successfully edited, waiting for approval');
    }
}
