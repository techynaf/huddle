<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\Log;
use App\Schedule;
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

        if ($schedule == null) {//create log without schedule
            if ($log == null) {
                return $this->createLog($user, $schedule, $now);
            } else {
                $log = Log::whereNull('end')->where('user_id', $user->id)->where('date', $date)->first();
                return $this->punchOut($user, $log, $schedule, $now);
            }
        } else {//create log with schedule
            $end = Carbon::parse($schedule->end);

            //check if the login time is within schedule range
            if ($now->copy()->format('H:i:s') >= $end) {//time is within range
                if ($log == null) {
                    return $this->createLog($user, $schedule, $now);
                } else {
                    $log = Log::whereNull('end')->where('user_id', $user->id)->where('date', $date)->first();

                    return $this->punchOut($user, $log, $schedule, $now);
                }
            } else {//time is not within range
                if ($log == null) {
                    return $this->createLog($user, null, $now);
                } else {
                    $log = Log::whereNull('end')->where('user_id', $user->id)->where('date', $date)->first();

                    return $this->punchOut($user, $log, null, $now);
                }
            }
            
        }
    }

    public function createLog ($user, $schedule, $now) {
        $log = new Log;
        $startTime = 0;

        if ($schedule == null) {
            $startTime = $now->copy()->format('H:i:s');
            $log->is_late = null;
        } else {
            $startTime = Carbon::parse($schedule->start);
            $diffInMins = gmdate("i:s", $now->diffInSeconds($startTime, false));

            if ($diffInMins < -10) {
                $log->is_late = true;
            } else {
                $log->is_late = false;
            }
        }

        $log->start = $startTime;

        //need to get branch id from device_id
        $log->branch_id = $user->branch->id;
        $log->user_id = $user->id;
        $log->date = $now->copy()->format('Y-m-d');
        $log->end = null;

        if ($schedule == null) {
            $log->schedule_id = null;
        } else {
            $log->schedule_id = $schedule->id;
        }
        

        $log->timestamps = false;
        $log->save();
        $user->logged_in = true;
        $message = 'Hello '.$user->name.'. You have logged in at '.$now->copy()->format('H:i');

        return $this->successResponse ($message, 1);
    }

    public function punchOut ($user, $log, $schedule, $now)
    {
        $endTime = 0;
        if ($schedule == null) {
            $endTime = $now->copy()->format('H:i:s');
        } else {
            $endTime = Carbon::parse($schedule->end);
        }
        
        $log->end = $endTime;
        $log->timestamps = false;
        $log->save();

        //add hours worked calculator
        $start = Carbon::parse($log->start);
        $end = Carbon::parse($log->end);
        $hours = $start->diffInHours($end);
        $user->logged_in = false;

        $message = 'Hello '.$user->name.'. You have logged out at'.$now->copy()->format('H:i').'. You have worked for '.$hours.' hours.';

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

    //create schedules for testing purposes
    public function logOut ()
    {
        $now = new Carbon;
        $date = $now->copy()->format('Y-m-d');
        $users = User::where('logged_in', true)->get();

        return view('test-employee-logger')->with('users', $users)->with('type', 'out');
    }
}
