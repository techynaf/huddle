<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\User;
use App\Log;

class AttendanceController extends Controller
{
    public function login (Request $request, $pin, $day)
    {
        $user = User::find($pin);
        $log = new Log;
        $log->user_id = $user->id;
        $log->punch_in = Carbon::now();
        $log->punch_out = NULL;
        $is_late = NULL;
        $schedules = $user->schedule;
        $schedule;

        foreach ($schedules as $schedules) {
            if ($s->day == $day) {
                $schedule = $s;
                break;
            }
        }
    }
}
