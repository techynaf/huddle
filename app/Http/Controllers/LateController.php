<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log;
use App\Late;

class LateController extends Controller
{
    public function check (Request $request, $id)
    {
        $log = Log::where('id', $id);
        $schedule = $log->schedule;

        if ($schedule == null) {
            return null;
        }

        $scheduled = Carbon::parse($schedule->start);
        $actual = Carbon::parse($log->start);

        if ($actual->diffInMinutes($scheduled) >= 10) { //checks if the person is late or not, late factor is 10 mins
            $late = new Late;
            $late->log_id = $log->id;
            $late->user_id = $log->user_id;
            $late->save();
        }

        return null;
    }
}
