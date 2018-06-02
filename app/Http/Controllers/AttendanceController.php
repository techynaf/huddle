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
        $string = '';

        if ($user == null) {
            return $this->failureResponse ('Invalid PIN');
        }

        //finding the schedule where the date is the today's date and the user id is of the pin's user
        $schedule = Schedule::where('date', $date)->where('user_id', $user->id)->first();

        if ($schedule == null) {
            return $this->failureResponse ('You are not scheduled for today.');
        }

        $log = Log::whereNotNull('punch_out_difference')->where('user_id', $user->id)->first();

        if ($log == null) {
            return $this->failureResponse('Sorry, you have already worked for today!');
        }

        $log = Log::whereNull('punch_out_difference')->where('user_id', $user->id)->first();

        //Check if the employee has already logged in or not
        if ($log == null) { //Employee has not logged in
            $startTime = Carbon::parse($schedule->start);

            $log = new Log;
            $log->punch_in_difference = $now->diffInSeconds($startTime, false);
            $diffInMins = gmdate("i:s", $log->punch_in_difference);

            //will need approval of manager if employee is more than 10 mins early or late.
            if ($diffInMins > 10 || $diffInMins < -10) {                
                $log->punch_in_approval = false;
            } else {
                $log->punch_in_approval = NULL;
            }

            $log->user_id = $user->id;
            $log->punch_out_difference = NULL;
            $log->punch_out_approval = NULL;

            return $this->successResponse ('Successfully Logged in!');
        } else { //Employee has logged in and will now log out.
            $endTime = Carbon::parse($schedule->end);
            $log->punch_out_difference = $now->diffInSeconds($endTime, false);
            $diffInMins = gmdate("i:s", $log->punch_out_difference);

            //will need approval of manager if employee is leaves more than 10 mins early or late.
            if ($diffInMins > 10 || $diffInMins < -10) {
                $log->punch_out_approval = false;
            } else {
                $log->punch_out_approval = NULL;
            }

            return $this->successResponse ('Logged out! Have a nice day!!');
        }
    }

    public function successResponse ($message) 
    {
        return response()->json([
            'status' => 'success',
            'message' => $message
        ]);
    }

    public function failureResponse ($message) 
    {
        return response()->json([
            'status' => 'failure',
            'message' => $message
        ]);
    }

    public function test () 
    {
        return view('test');
    }

    // public function login2 (Request $request)
    // {
    //     //Validating the data
    //     $this->validate($request, [
    //         'pin' => 'required',
    //         'device_id' => 'required'
    //     ]);

    //     $pin = $request->pin;
    //     $device_id = $request->device_id;
        
    //     $now = new Carbon;
    //     $date = $now->format('Y-m-d');
    //     $user = User::where('pin', $pin)->first();
    //     $string = '';

    //     if ($user == null) {
    //         return $this->failureResponse ('Invalid PIN');
    //     }

    //     //finding the schedule where the date is the today's date and the user id is of the pin's user
    //     $schedule = Schedule::where('date', $date)->where('user_id', $user->id)->first();

    //     if ($schedule == null) {
    //         return $this->failureResponse ('You are not scheduled for today.');
    //     }

    //     $log = Log::whereNull('punch_out_difference')->where('user_id', $user->id)->get();

    //     //Check if the employee has already logged in or not
    //     if (count($log) == 0) { //Employee has not logged in
    //         $startTime = Carbon::parse($schedule->start);

    //         $log = new Log;
    //         $diff = $now->diffInMinutes($startTime, false);

    //         //will need approval of manager if employee is more than 10 mins early or late.
    //         if ($diff > 10 || $diff < -10) {
    //             $log->punch_in_difference = $now->diffInMinutes($startTime, false)->format('%H:%I:%S');
    //             $log->punch_in_approval = false;
    //         } else {
    //             $log->punch_in_difference = '00:00:00';
    //             $log->punch_in_approval = NULL;
    //         }

    //         $log->user_id = $user->id;
    //         $log->punch_out_difference = NULL;
    //         $log->punch_out_approval = NULL;

    //         return $this->successResponse ('Successfully Logged in!');
    //     } else { //Employee has logged in and will now log out.
    //         $endTime = Carbon::parse($schedule->end);
    //         $diff = $now->diffInMinutes($endTime, false);

    //         //will need approval of manager if employee is leaves more than 10 mins early or late.
    //         if ($diff > 10 || $diff < -10) {
    //             $log->punch_out_difference = $now->diffInMinutes($endTime, false)->format('%H:%I:%S');
    //             $log->punch_out_approval = false;
    //         } else {
    //             $log->punch_out_difference = '00:00:00';
    //             $log->punch_out_approval = NULL;
    //         }

    //         return $this->successResponse ('Logged out! Have a nice day!!');
    //     }
    //     return 'something';
    // }
}
