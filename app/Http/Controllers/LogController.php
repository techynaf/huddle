<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Log;
use App\LogUpdate;
use Carbon\Carbon;

class LogController extends Controller
{
    public function show ()
    {
        if ($this->barista() || $this->hr()) {
            return redirect('/')->with('error', 'You are not authorized to access this view');
        }

        $notification = $this->checkNotifications();
        
        if (!is_array($notification)) {
            return view('profile/manager');
        }

        $logs = array();
        $today = new Carbon;
        $last = null;

        if ($today->copy()->format('l') == 'Sunday') {
            $last = $today->copy()->addWeeks(-1)->format('Y-m-d');
        } else {
            $last = $this->findSun(null)->format('Y-m-d');
        }

        $start = $today->copy()->format('Y-m-d');
        $dates = array();
        $ls = null;
        
        for (; $today->copy()->format('Y-m-d') >= $last; $today = $today->addDays(-1)) {
            array_push($dates, $today->copy()->format('Y-m-d'));
        }

        if ($this->manager()) {
            $ls = Log::where('branch_id', auth()->user()->branch_id)->where('date', '>=', $last)->
            where('date', '<=', $start)->whereNull('end')->get();
        } elseif ($this->superAdmin() || $this->dm()) {
            $ls = Log::where('date', '>=', $last)->where('date', '<=', $start)->whereNull('end')->get();
        }

        if ($this->manager()) {
            foreach ($ls as $l) {
                if ($l->user->roles->first()->name != 'manager' || $l->user->roles->first()->name != 'assistant-manager') {
                    array_push($logs, $l);
                }
            }
        } else {
            foreach ($ls as $l) {
                if ($l->user->roles->first()->name == 'manager' || $l->user->roles->first()->name == 'assistant-manager') {
                    array_push($logs, $l);
                }
            }
        }

        return view('logs/show')->with('notification', $notification)->with('logs', $logs)->with('dates', $dates);
    }

    public function store (Request $request, $id)
    {
        $log = Log::where('id', $id)->first();
        $start = Carbon::parse($request->start)->format('H:i:s');
        $end = Carbon::parse($request->end)->format('H:i:s');
        $update = new LogUpdate;
        $update->log_id = $id;
        $update->user_id = auth()->user()->id;
        $update->initial_start = $log->start;
        $update->initial_end = $log->end;
        $log->end = $end;

        if ($request->start != null) {
            $log->start = $start;
            $update->final_start = $start;
        }

        $log->timestamps = false;
        $log->save();
        $update->final_end = $end;
        $update->save();

        return redirect('/logs')->with('success', 'Log successfully altered');
    }
}
