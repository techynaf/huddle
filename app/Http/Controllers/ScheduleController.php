<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Schedule;
use App\User;
use App\Branch;
use App\Leave;
use App\WeeklyLeave;
use App\NoSchedule;
use Validator;
use Session;

class ScheduleController extends Controller
{
    private $months = array('January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
    private $days = array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Friday', 'Saturday');

    //include the year in this method as well

    public function scheduler (Request $request)
    {
        $notification = $this->checkNotifications();
        
        if (!is_array($notification)) {
            return view('profile/manager');
        }

        $intervals = array(':00', ':15', ':30', ':45');
        $times = array();
        $b = null;

        if ($this->barista()) {
            return redirect('/dashboard')->with('error', 'You are not authorized to access this view.');
        }

        $start = null;

        if ($request->date == null) {
            $start = $this->findSun(new Carbon);
        } else {
            $start = Carbon::parse($request->date);
            $start = $this->findSun($start);
        }

        $dates = $this->findWeeks();

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

        $users = null;
        $branches = Branch::all();

        if ($this->manager()) {
            $users = User::where('branch_id', auth()->user()->branch->id)->get();
        } else {
            if ($request->branch == null) {
                $users = User::where('branch_id', '!=', 0)->get();
            } else {
                $users = User::where('branch_id', $request->branch)->get();
                $b = Branch::where('id', $request->branch)->first();
            }
        }

        $schedules = array();

        foreach ($users as $user) {
            $user_schedule = array();

            foreach ($days as $date) {
                array_push($user_schedule, $this->dayOffChecker($user, $date[1]));
            }

            array_push($schedules, $user_schedule);
        }

        $path = $request->path();
        $now = new Carbon;
        $today = $now->copy()->format('Y-m-d');
        
        if ($b != null) {
            $branches = Branch::where('id', '!=', $b->id)->get();
        }

        return view('schedule/scheduler')->with('users', $users)->with('schedules', $schedules)->with('days', $days)->
        with('branches', $branches)->with('dates', $dates)->with('path', $path)->with('today', $today)->
        with('notification', $notification)->with('b', $b);
    }

    public function dayOffChecker ($user, $date)
    {
        $weekly = WeeklyLeave::where('user_id', $user->id)->where('start', '<=', $date)->where('end', '>=', $date)->
        where('approved', 1)->first();
        $day = Carbon::parse($date)->format('l');
        
        if ($weekly != null) {
            $day1 = Carbon::parse($weekly->day_1)->format('l');
            $day2 = Carbon::parse($weekly->day_2)->format('l');

            if ($day == $day1 || $day == $day2) {
                return 'day-off';
            }
        }
        
        if (Leave::where('user_id', $user->id)->where('start', '<=', $date)->where('end', '>=', $date)->where('is_approved', 1)->first() != null) {//checking if has approved leave
            $l = Leave::where('user_id', $user->id)->where('start', '<=', $date)->where('end', '>=', $date)->where('is_approved', 1)->first();
            if ($l->type == 2) {
                return 'sick';
            } elseif ($l->type == 3) {
                return 'annual';
            } else {
                return 'govt';
            }
        } elseif (NoSchedule::where('user_id', $user->id)->where('date', $date)->first() != null) { //checking if manager disabled this day
            return 'no-schedule';
        } else {
            $schedule = Schedule::where('user_id', $user->id)->where('date', $date)->first();
            
            if ($schedule == null) {
                $date = Carbon::parse($date)->addDays(-7)->format('Y-m-d');
                $schedule = Schedule::where('user_id', $user->id)->where('date', $date)->first();

                if ($schedule == null) {
                    return 'false';
                } else {
                    return $schedule;
                }
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

        //dd(Carbon::parse($starts[0]), $ends, $schedule_ids);

        for ($i = 0; $i < sizeof($schedule_ids); $i++) {
            if ($schedule_ids[$i] != 'off' && $starts[$counter] != null && $ends[$counter] != null) {
                dd('here');
                $schedule = null;

                if ($schedule_ids[$i] == '0') {
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
                $schedule->date = $dates[$i];
                $schedule->timestamps = false;
                $schedule->save();

                $counter++;
            }
        }

        $url = '/scheduler?date='.$dates[0];

        return redirect($url)->with('success', 'Schedule created for '.$user->name);
    }

    public function disable (Request $request, $id, $date, $branch)
    {
        $d = Carbon::parse($date);
        $d = $this->findSun($d);
        $url = '/scheduler?date='.$d->copy()->format('d-m-Y').'&branch='.$branch.'#'.$id;
        $noSchedule = new NoSchedule;
        $noSchedule->date = $date;
        $noSchedule->user_id = $id;
        $noSchedule->manager_id = auth()->user()->id;
        $noSchedule->save();

        return redirect($url);
    }

    public function enable (Request $request, $id, $date, $branch)
    {
        $noSchedule = NoSchedule::where('user_id', $id)->where('date', $date)->first();
        $noSchedule->delete();

        $d = Carbon::parse($date);
        $d = $this->findSun($d);
        $url = '/scheduler?date='.$d->copy()->format('d-m-Y').'&branch='.$branch.'#'.$id;

        return redirect($url);
    }
}
