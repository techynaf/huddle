<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\Log;
use App\Schedule;
use App\Late;
use Validator;
use Session;

class AttendanceController extends Controller
{
    /*
        Conditions for punch in and out approval        
            if punch_in_approval or punch_out_approval == NULL
            approval is not needed
            
            if punch_in_approval or punch_out_approval == False
            emplyee was late or early and needs approval
            
            if punch_in_approval or punch_out_approval == True
            employee was late or early and was approved
        
        Conditions for punch in and out difference
            if punch_in_difference or punch_out_difference is positive
            the employee came or left early, respectively
            
            if punch_in_difference or punch_out_difference is negative
            the employee came or left late, respectively

        Json Response states
            0 == Invalid ID
            1 == Successfully login
            2 == Successfully logout
    */
    public function login (Request $request)
    {
        //Validating the data
        $this->validate($request, [
            'pin' => 'required',
            'device_id' => 'nullable'
        ]);

        $pin = $request->pin;
        $device_id = $request->device_id;

        //getting the current timestamp
        $now = new Carbon;
        $date = $now->format('Y-m-d');
        $user = User::where('pin', $pin)->first();

        if ($user == null) {
            return $this->failureResponse ('Invalid PIN', 0);
        }

        //finding the schedule where the date is the today's date and the user id is of the pin's user
        $schedule = Schedule::where('date', $date)->where('user_id', $user->id)->first();
        $log = Log::whereNull('end')->where('user_id', $user->id)->where('date', $date)->first();

        if ($log == null) {
            return $this->createLog($user, $schedule, $now);
        } else {
            return $this->punchOut($user, $log, $schedule, $now);
        }
    }

    public function createLog ($user, $schedule, $now) {
        $log = new Log;
        $startTime = $now->copy()->format('H:i:s');
        $log->start = $startTime;

        //need to get branch id from device_id
        $log->branch_id = $user->branch->id;
        $log->user_id = $user->id;
        $log->date = $now->copy()->format('Y-m-d');
        $log->end = null;

        if ($schedule == null) {
            $log->schedule_id = 0;
        } else {
            $l = Log::where('schedule_id', $schedule->id)->first();

            if ($l == null) {
                $log->schedule_id = $schedule->id;
            } else {
                $log->schedule_id = 0;
            }
        }

        $log->timestamps = false;
        $log->save();

        if ($log->schedule_id != 0) {
            $this->check($log, $schedule);
        }

        $user->logged_in = true;
        $user->timestamps = false;
        $user->save();
        $message = 'Hello '.$user->name.'. You have logged in at '.$now->copy()->format('H:i');

        return $this->successResponse ($message, 1);
    }

    public function punchOut ($user, $log, $schedule, $now)
    {
        $log->end = $now->copy()->format('H:i:s');;
        $log->timestamps = false;
        $log->save();

        //add hours worked calculator
        $start = Carbon::parse($log->start);
        $end = Carbon::parse($log->end);
        $hours = $start->diffInHours($end);
        $user->logged_in = false;
        $user->timestamps = false;
        $user->save();

        $message = 'Hello '.$user->name.'. You have logged out at '.$now->copy()->format('H:i').'. You have worked for '.$hours.' hours.';

        return $this->successResponse ($message, 2);
    }

    //success response json
    public function successResponse ($message, $state) 
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'state' => $state
        ]);
    }

    //failure response json
    public function failureResponse ($message, $state) 
    {
        return response()->json([
            'status' => 'failure',
            'message' => $message,
            'state' => $state
        ]);
    }

    public function check ($log, $schedule)
    {
        $scheduled = Carbon::parse($schedule->start);
        $actual = Carbon::parse($log->start);

        if ($actual->diffInMinutes($scheduled) >= 10) { //checks if the person is late or not, late factor is 10 mins
            $late = new Late;
            $late->date = $log->date;
            $late->log_id = $log->id;
            $late->user_id = $log->user_id;
            $late->save();
        }
    }
}
