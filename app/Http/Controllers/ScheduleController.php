<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Schedule;
use App\User;
use Validator;
use Session;

class ScheduleController extends Controller
{
    private $months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');

    //include the year in this method as well
    public function month ()
    {
        $role = auth()->user()->role->first();
        
        if ($role == 'barista') {
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
        $role = auth()->user()->role->first();
        
        if ($role == 'barista') {
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
        $role = auth()->user()->role->first();
        
        if ($role == 'barista') {
            return redirect('/')->with('error', 'You are not authorized to access this page.');
        }

        $branch_id = auth()->user()->branch_id;
        $date = $year.'-'.$month.'-'.$day;

        $schedules = Schedule::where('date', $date)->where('branch_id', $branch_id)->get();
        $users = User::where('branch_id', $branch_id)->get();

        return view('add-schedule')->with('schedules', $schedules)->with('users', $users)->with('date', $date);
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
        $schedule->timestamps = false;
        $schedule->save();
        $date = explode('-', $date);
        $url = '/schedule/create/'.$date[0].'/'.$date[1].'/'.$date[2];

        return redirect($url)->with('success', 'Schedule successfully created.');
    }

    public function view ()
    {
        $role = auth()->user()->role->first();

        if ($role == 'barista') {
            return redirect('/')->with('error', 'You are not authorized to view this page');
        }

        if ($role == 'manager') {
            $branch_id = auth()->user()->branch_id;
            $schedule_last = Schedule::orderby('date', 'desc')->where('branch_id', $branch_id)->first();
            $schedule_first = Schedule::orderby('date', 'asc')->where('branch_id', $branch_id)->first();
            $date_last = $schedule_last->date;
            $date_first = $schedule_first->date;
            $date_last = explode('-', $date_last);
            $date_first = explode('-', $date_first);
        } else {
            $schedule_last = Schedule::orderby('date', 'desc')->first();
            $schedule_first = Schedule::orderby('date', 'asc')->first();
            $date_last = $schedule_last->date;
            $date_first = $schedule_first->date;
            $date_last = explode('-', $date_last);
            $date_first = explode('-', $date_first);
        }

        return view('schedule-date-select')->with('date_last', $date_last)->with('date_first', $date_first)->
        with('months', $this->months);
    }

    public function showDates (Request $request)
    {
        $this->validate($request, [
            'year' => 'required',
            'month' => 'required'
        ]);

        if(auth()->user()->role[0] == 'barista') {
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
            
            if (auth()->user()->role->first == 'manager') {
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
}