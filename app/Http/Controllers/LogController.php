<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Log;
use App\LogUpdate;
use Carbon\Carbon;
use Carbon\CarbonPeriod;

class LogController extends Controller
{
    public function show ()
    {
        if ($this->barista()) {
            return redirect('/')->with('error', 'You are not authorized to access this view');
        }

        $notification = $this->checkNotifications();
        
        if (!is_array($notification)) {
            return view('profile/manager');
        }

        $now = Carbon::now();
        $logs_dates = Log::whereIn('branch_id', auth()->user()->branch->descendent)
            ->where('date', '>=', $now->copy()->addWeeks(-4)->toDateString())->orderBy('date', 'DESC')->get()->groupBy('date');
        // dd($logs_dates);

        return view('logs/show')->with('notification', $notification)->with('logs_dates', $logs_dates);
    }

    public function store (Request $request, $id)
    {
        $log = Log::where('id', $id)->first();
        $start = Carbon::parse(implode(' ', explode('T', $request->start)))->toDateTimeString();
        $end = Carbon::parse(implode(' ', explode('T', $request->end)))->toDateTimeString();
        $update = new LogUpdate;
        $update->log_id = $id;
        $update->user_id = auth()->user()->id;
        $update->initial_start = $log->start;
        $update->initial_end = $log->end;
        $log->end = $end;
        $log->date = Carbon::parse(implode(' ', explode('T', $request->start)))->toDateString();

        if ($request->start != null) {
            $log->start = $start;
            $update->final_start = $start;
        }

        $log->timestamps = false;
        $log->save();
        $log->createOvertime();
        $update->final_end = $end;
        $update->save();

        return redirect('/logs')->with('success', 'Log successfully altered');
    }
}
