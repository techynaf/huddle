<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Schedule;
use App\User;
use App\Branch;
use App\Leave;
use App\WeeklyLeave;
use Validator;
use Session;

class ScheduleController extends Controller
{
    private $months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');

    //include the year in this method as well
    public function month ()
    {
        $role = auth()->user()->roles->first()->name;
        
        if ($role == 'barista' || $role == 'admin') {
            return redirect('/')->with('error', 'You are not authorized to access this page.');
        }

        $now = new Carbon;
        $date = $now->copy()->format('m-d');
        $year = $now->copy()->format('Y');
        $years = array();
        array_push($years, $year);
        $months = array('January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December');

        if ($date >= '12-16') {
            $year++;
            array_push($years, $year);
        }

        return view('month-select')->with('months', $this->months)->with('years', $years);
    }

    public function day (Request $request, $year, $month)
    {
        $role = auth()->user()->roles->first()->name;
        
        if ($role == 'barista' || $role == 'admin') {
            return redirect('/')->with('error', 'You are not authorized to access this page.');
        }

        $date = 0;
        $name = $this->months[$month - 1];

        if ($month == 2) {
            if ($year % 4 == 0) {
                $date = 29;
            } else {
                $date = 28;
            }
        } elseif ($month >= 8) {
            if ($month % 2 == 0) {
                $date = 31;
            } else {
                $date = 30;
            }
        } else {
            if ($month % 2 == 1) {
                $date = 31;
            } else {
                $date = 30;
            }
        }

        return view('date-select')->with('month', $month)->with('dates', $date)->with('name', $name)->with('year', $year);
    }

    public function add (Request $request, $year, $month, $day)
    {
        $role = auth()->user()->roles->first()->name;
        
        if ($role == 'barista' || $role == 'admin') {
            return redirect('/')->with('error', 'You are not authorized to access this page.');
        }

        $branch_id = auth()->user()->branch_id;
        $date = $year.'-'.$month.'-'.$day;
        $branches = Branch::all();
        $schedules = Schedule::where('date', $date)->where('branch_id', $branch_id)->get();
        $users = User::where('branch_id', $branch_id)->get();

        return view('add-schedule')->with('schedules', $schedules)->with('users', $users)->with('date', $date)->
        with('branches', $branches);
    }

    public function store (Request $request, $date)
    {
        $schedule = new Schedule;
        $user = User::where('id', $request->user)->first();
        $schedule->user_id = $request->user;
        $schedule->branch_id = $user->branch_id;
        $schedule->date = $date;
        $start = Carbon::parse($request->start)->format('H:i');
        $end = Carbon::parse($request->end)->format('H:i');
        $schedule->start = $start;
        $schedule->end = $end;
        $schedule->start_branch = $request->start_branch;
        $schedule->end_branch = $request->end_branch;
        $schedule->timestamps = false;
        $schedule->save();
        $date = explode('-', $date);
        $url = '/schedule/create/'.$date[0].'/'.$date[1].'/'.$date[2];

        return redirect($url)->with('success', 'Schedule successfully created.');
    }

    public function view (Request $request)
    {
        $role = auth()->user()->roles->first()->name;

        if ($role == 'barista') {
            return redirect('/')->with('error', 'You are not authorized to view this page');
        }

        if ($request->date == null) {
            $now = new Carbon;
            
            while ($now->copy()->format('l') != 'Sunday') {
                $now = $now->addDays(-1);
            }

            $dates = array();

            for ($i = -4; $i <= 4; $i++) {
                $date = array($now->copy()->addWeeks($i)->format('Y-m-d'), $now->copy()->addWeeks($i + 1)->format('Y-m-d'));
                array_push($dates, $date);
            }

            return view('schedule/select-date')->with('dates', $dates)->with('flow', false);
        } else {
            $date_first = Carbon::parse($request->date);
            $date_last = $date_first->copy()->addDays(6);
            $schedules = array();
            $branches = null;

            if (auth()->user()->roles->first()->name == 'manager') {
                array_push($schedules, Schedule::where('branch_id', auth()->user()->branch_id)->
                where('date', '>=', $date_first->format('Y-m-d'))->where('date', '<=', $date_last)->get());
                $branches = Branch::where('id', auth()->user()->branch_id)->first();
            } else {
                $branches = Branch::all();

                foreach ($branches as $branch) {
                    array_push($schedules, Schedule::where('branch_id', $branch->id)->
                    where('date', '>=', $date_first->format('Y-m-d'))->where('date', '<=', $date_last)->get());
                }
            }
        }

        $date_first = $date_first->format('d F Y');
        $date_last = $date_last->format('d F Y');

        return view('schedule/show')->with('schedules', $schedules)->with('date_first', $date_first)->
        with('date_last', $date_last)->with('branches', $branches);
    }

    public function showDates (Request $request)
    {
        $this->validate($request, [
            'year' => 'required',
            'month' => 'required'
        ]);

        if(auth()->user()->roles->first()->name == 'barista') {
            return redirect('/')->with('error', 'You are not authorized to view this page');
        }

        $schedules = null;
        $date = $request->date;
        $flow = null;
        $name = $this->months[$request->month - 1];
        $message = 'Select Date';

        if ($date == null) {
            if ($request->month == 2) {
                if ($request->year % 4 == 0) {
                    $date = 29;
                } else {
                    $date = 28;
                }
            } elseif ($request->month >= 8) {
                if ($request->month % 2 == 0) {
                    $date = 31;
                } else {
                    $date = 30;
                }
            } else {
                if ($request->month % 2 == 1) {
                    $date = 31;
                } else {
                    $date = 30;
                }
            }

            $flow = false;
        } else {
            $flow = true;
            $check = $request->year.'-'.$request->month.'-'.$request->date;
            $message = 'Try another date';
            
            if (auth()->user()->roles->first()->name == 'manager') {
                $schedules = Schedule::where('date', $check)->where('branch_id', auth()->user()->branch_id)->get();
            } else {
                $schedules = Schedule::where('date', $check)->get();
            }

            if ($request->month == 2) {
                if ($request->year % 4 == 0) {
                    $date = 29;
                } else {
                    $date = 28;
                }
            } elseif ($request->month >= 8) {
                if ($request->month % 2 == 0) {
                    $date = 31;
                } else {
                    $date = 30;
                }
            } else {
                if ($request->month % 2 == 1) {
                    $date = 31;
                } else {
                    $date = 30;
                }
            }
        }
        
        return view('schedule-show')->with('flow', $flow)->with('schedules', $schedules)->with('date', $date)->
        with('year', $request->year)->with('month',$request->month)->with('name', $name)->with('message', $message);
    }

    public function edit (Request $request, $id)
    {
        if (auth()->user()->roles->first()->name == 'barista') {
            return redirect('/')->with('error', 'You are not authorized to view this page');
        }
        
        $schedule = Schedule::where('id', $id)->first();
        $branches = Branch::all();

        return view('schedule-edit')->with('schedule', $schedule)->with('branches', $branches);
    }

    public function update (Request $request, $id)
    {
        $schedule = Schedule::where('id', $id)->first();
        $start = Carbon::parse($request->start)->format('H:i');
        $end = Carbon::parse($request->end)->format('H:i');
        $schedule->start = $start;
        $schedule->end = $end;
        $schedule->start_branch = $request->start_branch;
        $schedule->end_branch = $request->end_branch;
        $schedule->timestamps = false;
        $schedule->save();

        return redirect('/schedule/view')->with('success', 'Edit successfully stored');
    }

    public function scheduler (Request $request)
    {
        if (auth()->user()->roles->first()->name == 'barista') {
            return redirect('/dashboard')->with('error', 'You are not authorized to access this view.');
        }

        $start = null;

        if ($request->date == null) {
            $now = new Carbon;
            
            while ($now->copy()->format('l') != 'Sunday') {
                $now = $now->addDays(-1);
            }

            $start = Carbon::parse($now->format('Y-m-d'));
        } else {
            $start = Carbon::parse($request->date);
        }

        $dates = array();
        $s = $start;
        $e = $start->copy()->addDays(6);

        for ($i = -4; $i <= 4; $i++) {
            $d = array($s->copy()->addWeeks($i)->format('d-m-Y'), $e->copy()->addWeeks($i)->format('d-m-Y'));
            array_push($dates, $d);
        }

        $d = $start;
        $end = $start->copy()->addDays(6);
        $start = $start->format('Y-m-d');
        $end = $end->format('Y-m-d');
        $days = array(array($d->copy()->format('l'), $d->copy()->format('Y-m-d')));
        $d = $d->addDay();

        while($d->copy()->format('l') != 'Sunday') {
            $x = array($d->copy()->format('l'), $d->copy()->format('Y-m-d'));
            array_push($days, $x);
            $d = $d->addDay();
        }

        $users = User::where('branch_id', auth()->user()->branch->id)->get();
        $branches = Branch::all();
        $schedules = array();

        foreach ($users as $user) {
            $user_schedule = array();

            foreach ($days as $date) {
                array_push($user_schedule, $this->dayOffChecker($user, $date[1]));
            }

            array_push($schedules, $user_schedule);
        }

        return view('schedule/scheduler')->with('users', $users)->with('schedules', $schedules)->with('days', $days)->
        with('branches', $branches)->with('dates', $dates);
    }

    public function dayOffChecker ($user, $date)
    {
        if (WeeklyLeave::where('user_id', $user->id)->where('date_1', $date)->where('approved', true)->first() != null) {//checking if weekly off
            return 'day-off';
        } elseif (WeeklyLeave::where('user_id', $user->id)->where('date_2', $date)->where('approved', true)->first() != null) {//checking if weekly off
            return 'day-off';
        } elseif (Leave::where('user_id', $user->id)->where('start', '<=', $date)->where('end', '>=', $date)->where('is_approved', true)->first() != null) {//checking if has approved leave
            return 'day-off';
        } else {
            $schedule = Schedule::where('user_id', $user->id)->where('date', $date)->first();
            
            if ($schedule == null) {
                return false;
            } else {
                return $schedule;
            }
        }
    }

    public function schedule (Request $request, $id)
    {
        $user = User::where('id', $id)->first();
        
        $dates = $request->date;
        $schedule_ids = $request->s_id;
        $starts = $request->start;
        $ends = $request->end;
        $s_branches = $request->entry_b;
        $e_branches = $request->exit_b;
        $counter = 0;
        for ($i = 0; $i < sizeof($dates); $i++) {
            if ($schedule_ids[$i] != 'off') {
                $schedule = null;
                if ($schedule_ids[$i] == '0') {
                    dd($schedule_ids[$i]);
                    $schedule = new Schedule;
                } else {
                    $schedule = Schedule::where('id', $schedule_ids[$i])->first();
                }

                $schedule->user_id = $user->id;
                $schedule->branch_id = $user->branch_id;
                $schedule->start = Carbon::parse($starts[$counter])->format('H:i:s');
                $schedule->end = Carbon::parse($ends[$counter])->format('H:i:s');
                $schedule->start_branch = $s_branches[$counter];
                $schedule->end_branch = $e_branches[$counter];
                $schedule->timestamps = false;
                $schedule->save();
                $counter++;
            }
        }

        $url = '/scheduler?date='.$dates[0];

        return redirect($url)->with('success', 'Schedule created for '.$user->name);
    }
}
