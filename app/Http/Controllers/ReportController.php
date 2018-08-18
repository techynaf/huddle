<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\Schedule;
use App\Late;
use App\Log;
use App\Branch;

class ReportController extends Controller
{
    private $months = array('January - February', 'February - March', 'March - April', 'April - May', 'May - June', 'June - July', 'July - August', 'August - September', 'September - October', 'October - November', 'November - December', 'December - January');
    private $base = 2018;
    private $start = array('01-20', '02-20', '03-20', '04-20', '05-20', '06-20', '07-20', '08-20', '09-20', '10-20', '11-20', '12-20');
    private $end = array('02-19', '03-19', '04-19', '05-19', '06-19', '07-19', '08-19', '09-19', '10-19', '11-19', '12-19', '01-19');
    
    public function hours (Request $request)
    {
        if ($this->barista() || $this->manager() || $this->dm()) {
            return redirect('/')->with('error', 'You are not authorized to access this view');
        }

        $notification = $this->checkNotifications();

        if (count($notification) == 1) {
            return view('profile/manager');
        }

        $url = '/hour';

        if ($request->month == null) {
            $i = Carbon::parse(null)->format('Y');
            $years = array();

            for ($i = Carbon::parse(null)->format('Y'); $i >= $this->base; $i--) {
                array_push($years, $i);
            }

            return view('report/date')->with('notification', $notification)->with('months', $this->months)->with('years', $years)->with('url', $url);
        } else {
            if ($this->barista() || $this->manager() || $this->dm()) {
                return redirect()->with('error', 'You are not authorized to view this');
            }
    
            $start = $request->year.'-'.$this->start[$request->month];
            $end = null;

            if ($request->month == 11) {
                $end = ($request->year + 1).'-'.$this->end[$request->month];
            } else {
                $end = $request->year.'-'.$this->end[$request->month];
            }
    
            $x = array($start, $this->findSun(Carbon::parse($start)->addWeek())->addDays(-1)->format('Y-m-d'));
            $weeks = array($x);
            $x = 0;
            
            //Finding weeks
            while (true) {
                $s = Carbon::parse($weeks[$x][1])->addDay();
                $e = $s->copy()->addDays(6);
    
                if ($e->copy()->format('Y-m-d') >= $end) {
                    $s = $s->format('Y-m-d');
                    array_push($weeks, array($s, $end));
                    break;
                } else {
                    $x++;
                    array_push($weeks, array($s->format('Y-m-d'), $e->format('Y-m-d')));
                }
            }
    
            $branches = Branch::all();
            $users = User::where('branch_id', '!=', 0)->orderBy('branch_id')->get();
            $hours = array();
    
            foreach ($users as $user) {
                $hr = array();
                $total = 0;
    
                foreach ($weeks as $week) {
                    $logs = Log::where('user_id', $user->id)->where('date', '>=', $week[0])->
                    where('date', '<=', $week[1])->get();
    
                    $x = 0;
    
                    foreach ($logs as $log) {
                        $s = Carbon::parse($log->start);
                        $e = Carbon::parse($log->end);
                        
                        if ($e != null) {
                            $x = $x + $s->diffInMinutes($e);
                        }
                    }
    
                    $total = $total + $x;
                    $x = floor($x / 60).':'.($x % 60);
                    array_push($hr, $x);
                }
    
                $total = floor($total / 60).':'.($total % 60);
                array_push($hr, $total);
                array_push($hours, $hr);
            }
    
            $x = 0;
    
            return view('report/hour')->with('notification', $notification)->with('branches', $branches)->
            with('users', $users)->with('hours', $hours)->with('weeks', $weeks)->with('x', $x);
        }
    }

    public function lateReport (Request $request)
    {
        if ($this->barista() || $this->manager() || $this->dm()) {
            return redirect('/')->with('error', 'You are not authorized to access this view');
        }

        $notification = $this->checkNotifications();

        if (count($notification) == 1) {
            return view('profile/manager');
        }
        
        $url = '/late';

        if ($request->month == null) {
            $i = Carbon::parse(null)->format('Y');
            $years = array();

            for ($i = Carbon::parse(null)->format('Y'); $i >= $this->base; $i--) {
                array_push($years, $i);
            }

            return view('report/date')->with('notification', $notification)->with('months', $this->months)->with('years', $years)->with('url', $url);
        } else {
            $start = $request->year.'-'.$this->start[$request->month];
            $end = null;

            if ($request->month == 11) {
                $end = ($request->year + 1).'-'.$this->end[$request->month];
            } else {
                $end = $request->year.'-'.$this->end[$request->month];
            }

            $branches = Branch::all();
            $lates = Late::where('date', '>=', $start)->where('date', '<=', $end)->orderBy('branch_id')->get();
            $duration = array();

            foreach ($lates as $late) {
                $log = $late->log;
                $schedule = $log->schedule;
                $actualTime = Carbon::parse($log->start);
                $scheduledTime = Carbon::parse($schedule->start);
                array_push($duration, $scheduledTime->diffInMinutes($actualTime));
            }

            return view('report/late')->with('notification', $notification)->with('branches', $branches)->
            with('lates', $lates)->with('x', 0)->with('duration', $duration);
        }
    }
}
