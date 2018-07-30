<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\Schedule;
use App\Log;
use App\Branch;

class ReportController extends Controller
{
    public function hours ()
    {
        if ($this->barista() || $this->manager() || $this->dm()) {
            return redirect()->with('error', 'You are not authorized to view this');
        }

        $notification = $this->checkNotifications();
        $start = null;
        $end = null;
        $now = new Carbon;
        $hours = array();

        if ($now->copy()->format('m') == 1) {
            $end = $now->copy()->format('Y').'-1-19';
            $start = ($now->copy()->format('Y') - 1).'-12-20';
        } else {
            $end = $now->copy()->format('Y').'-'.$now->copy()->format('m').'-19';
            $start = $now->copy()->format('Y').'-'.($now->copy()->format('m') - 1).'-20';
        }

        $x = array($start, $this->findSat(Carbon::parse($start)->addWeek())->format('Y-m-d'));
        $weeks = array($x);
        $x = 0;

        //Finding weeks
        while (true) {
            $s = Carbon::parse($weeks[$x][1])->addDay();
            $e = $s->addDays(6);

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

        return view('test')->with('notification', $notification)->with('branches', $branches)->
        with('users', $users)->with('hours', $hours)->with('weeks', $weeks)->with('x', $x);
    }
}
