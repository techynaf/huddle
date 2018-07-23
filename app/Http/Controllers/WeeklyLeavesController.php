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
        $start = $this->findSun($now->addDays(7))->format('Y-m-d');
        $end = $this->findSun($now->addDays(7))->addDays(-1)->format('Y-m-d');

        return view('weekly/create')->with('days', $this->days)->with('start', $start)->with('end', $end);
    }

    public function store (Request $request, $id)
    {
        $this->validate($request, [
            'day_1' => 'required',
            'day_2' => 'required',
            'start' => 'required',
            'end' => 'required',
        ]);

        $weekly = new WeeklyLeave;
        $weekly->user_id = $id;
        $weekly->start = Carbon::parse($request->start)->format('Y-m-d');
        $weekly->end = Carbon::parse($request->end)->format('Y-m-d');

        $start = Carbon::parse($request->start);
        $end = Carbon::parse($request->end);
        $leaves = WeeklyLeave::where('user_id', $id)->where('end', '>', $start->copy()->format('Y-m-d'))->get();

        if (count($leaves) != 0) {
            return redirect('/')->with('error', 'Weekly Leaves already exits for this date range, please use edit to change them');
        }

        $weekly = new WeeklyLeave;
        $weekly->user_id = $id;
        $weekly->start = Carbon::parse($request->start)->format('Y-m-d');
        $weekly->end = Carbon::parse($request->end)->format('Y-m-d');
        $weekly->day_1 = $request->day_1;
        $weekly->day_2 = $request->day_2;
        $weekly->branch_id = auth()->user()->branch_id;
        $weekly->approved = null;
        $weekly->save();

        return redirect('/dashboard')->with('success', 'Weekly day off successfully added, waiting for approval');
    }

    public function edit ()
    {
        $now = new Carbon;

        $leaves = WeeklyLeave::where('user_id', auth()->user()->id)->where('end', '>', $now->copy()->format('Y-m-d'))->
        orderBy('start')->get();

        $now = new Carbon;
        $start = $this->findSun($now->addDays(7))->format('Y-m-d');
        $end = $this->findSun($now->addDays(7))->addDays(-1)->format('Y-m-d');

        return view('weekly/edit')->with('start', $start)->with('end', $end)->with('days', $this->days)->
        with('leaves', $leaves);
    }

    public function update (Request $request, $id)
    {
        $this->validate($request, [
            'start' => 'required',
            'end' => 'required',
            'start' => 'required',
            'end' => 'required',
        ]);

        $start = Carbon::parse($request->start);
        $end = Carbon::parse($request->end);
        
        $l = WeeklyLeave::where('user_id', $id)->where('end', '<', $end->copy()->format('Y-m-d'))->
        where('start', '>', $start->copy()->format('Y-m-d'))->first();

        if ($l != null) {
            return redirect('/dashboard')->with('error', 'You have an overlapping leave');
        }

        $cleave = WeeklyLeave::where('user_id', $id)->where('end', '>=', $end->copy()->format('Y-m-d'))->
        where('start', '<=', $start->copy()->format('Y-m-d'))->first();

        if ($cleave == null) {
            return redirect('/dashboard')->with('error', 'There are no scheduled off days in the date range.');
        }

        if ($cleave->start == $start->copy()->format('Y-m-d') && $cleave->end == $end->copy()->format('Y-m-d')) {
            $cleave->day_1 = $request->day_1;
            $cleave->day_2 = $request->day_2;
            $cleave->approved = null;
            $cleave->save();
        } elseif ($cleave->end  <= $end->copy()->format('Y-m-d') && $cleave->start < $start->copy()->format('Y-m-d')) {
            $end = $cleave->end;
            $cleave->end = $start->copy()->addDays(-1)->format('Y-m-d');
            $cleave->save();

            $weekly = new WeeklyLeave;
            $weekly->user_id = $id;
            $weekly->start = $start->format('Y-m-d');
            $weekly->end = $end;
            $weekly->day_1 = $request->day_1;
            $weekly->day_2 = $request->day_2;
            $weekly->branch_id = auth()->user()->branch_id;
            $weekly->approved = null;
            $weekly->save();
        } elseif ($cleave->start == $start->copy()->format('Y-m-d') && $cleave->end > $end->copy()->format('Y-m-d')) {
            $weekly = new WeeklyLeave;
            $weekly->user_id = $id;
            $weekly->start = $start->format('Y-m-d');
            $weekly->end = $end->copy()->format('Y-m-d');
            $weekly->day_1 = $request->day_1;
            $weekly->day_2 = $request->day_2;
            $weekly->branch_id = auth()->user()->branch_id;
            $weekly->approved = null;
            $weekly->save();

            $cleave->start = $end->addDay()->format('Y-m-d');
            $cleave->save();
        } else {
            $weekly = new WeeklyLeave;
            $weekly->user_id = $cleave->user_id;
            $weekly->start = $end->copy()->addDay()->format('Y-m-d');
            $weekly->end = $cleave->end;
            $weekly->day_1 = $cleave->day_1;
            $weekly->day_2 = $cleave->day_2;
            $weekly->branch_id = auth()->user()->branch_id;
            $weekly->approved = $cleave->approved;
            $weekly->save();

            $cleave->end = $start->copy()->addDays(-1)->format('Y-m-d');
            $cleave->save();

            $leave = new WeeklyLeave;
            $leave->user_id = $cleave->user_id;
            $leave->start = $start->copy()->format('Y-m-d');
            $leave->end = $end->copy()->format('Y-m-d');
            $leave->day_1 = $request->day_1;
            $leave->day_2 = $request->day_2;
            $leave->branch_id = auth()->user()->branch_id;
            $leave->approved = null;
            $leave->save();
        }

        return redirect('/dashboard')->with('success', 'Weekly day off successfully edited, waiting for approval');
    }

    public function findSun ($date)
    {
        if ($date == null) {
            $date = new Carbon;
        }

        if ($date->copy()->format('l') == 'Sunday') {
            return $date;
        }

        while ($date->copy()->format('l') != 'Sunday') {
            $date = $date->addDays(-1);
        }

        return $date;
    }

    public function show ()
    {
        if (auth()->user()->roles->first()->name == 'barista') {
            return redirect('/')->with('error', 'You are not authorized to view this');
        }

        $leaves = WeeklyLeave::where('branch_id', auth()->user()->branch_id)->whereNull('approved')->
        orderBy('user_id')->orderBy('start')->get();

        return view('weekly/show')->with('leaves', $leaves);
    }

    public function process (Request $request, $id)
    {
        $leave = WeeklyLeave::find($id);
        $leave->approved = $request->status;
        $leave->save();
        $message = 'Weekly has been ';

        if ($request->status) {
            $message = $message.'approved';
        } else {
            $message = $message.'declined';
        }

        return redirect ('/show/weekly')->with('success', $message);
    }
}
