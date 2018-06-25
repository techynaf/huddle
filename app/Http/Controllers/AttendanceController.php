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
        $log = Log::whereNull('punch_out_difference')->where('user_id', $user->id)->where('date', $date)->first();

        if ($schedule == null) {//create log without schedule
            if ($log == null) {
                return $this->createLog($user, $schedule, $now);
            } else {
                $log = Log::whereNull('punch_out_difference')->where('user_id', $user->id)->where('date', $date)->first();
                return $this->punchOut($user, $log, $schedule, $now);
            }
        } else {//create log with schedule
            $end = Carbon::parse($schedule->end);

            //check if the login time is within schedule range
            if ($now->copy()->format('H:i:s') >= $end) {//time is within range
                if ($log == null) {
                    return $this->createLog($user, $schedule, $now);
                } else {
                    $log = Log::whereNull('punch_out_difference')->where('user_id', $user->id)->where('date', $date)->first();

                    return $this->punchOut($user, $log, $schedule, $now);
                }
            } else {//time is not within range
                if ($log == null) {
                    return $this->createLog($user, null, $now);
                } else {
                    $log = Log::whereNull('punch_out_difference')->where('user_id', $user->id)->where('date', $date)->first();

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
        } else {
            $startTime = Carbon::parse($schedule->start);
        }

        $log->punch_in_difference = $now->diffInSeconds($startTime, false);
        $diffInMins = gmdate("i:s", $log->punch_in_difference);

        if ($diffInMins < -10) {
            $log->is_late = true;
        } else {
            $log->is_late = false;
        }

        //need to get branch id from device_id
        $log->branch_id = $user->branch->id;
        $log->user_id = $user->id;
        $log->date = $now->copy()->format('Y-m-d');
        $log->punch_out_difference = null;

        // if ($schedule == null) {
        //     $log->schedule_id = null;
        // } else {
        //     $log->schedule_id = $schedule->id;
        // }
        

        $log->timestamps = false;
        $log->save();

        return $this->successResponse ('Logged in', 1);
    }

    public function punchOut ($user, $log, $schedule, $now)
    {
        $endTime = 0;
        if ($schedule == null) {
            $endTime = $now->copy()->format('H:i:s');
        } else {
            $endTime = Carbon::parse($schedule->end);
        }
        
        $log->punch_out_difference = $now->diffInSeconds($endTime, false);
        $diffInMins = gmdate("i:s", $log->punch_out_difference);
        $log->timestamps = false;
        $log->save();

        return $this->successResponse ('Logged out! Have a nice day!!', 2);
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

    public function requestLeave ()
    {
        $types = array('Sick Leave', 'sick_leave', 'Annual Leave', 'annual_leave', 'Government Holiday', 'govt_hoiliday');
        $id = auth()->user()->id;

        return view('request')->with('id', $id)->with('types', $types);
    }

    public function storeLeaveRequest (Request $request, $id)
    {
        $this->validate($request, [
            'subject' => 'required',
            'body' => 'required',
            'type' => 'required'
        ]);

        $start = Carbon::parse($request->start)->format('Y-m-d');
        $end = Carbon::parse($request->end)->format('Y-m-d');

        if ($start > $end) {
            return redirect('/request')->with('error', 'Invalid date range');
        }

        $req = new AllRequest;
        $req->user_id = $id;
        $req->hr_approved = null;
        $req->manager_approved = null;
        $req->subject = $request->subject;
        $req->start = $start;
        $req->end = $end;
        $req->branch_id = auth()->user()->branch_id;
        $req->body = $request->body;
        $req->type = $request->type;
        $req->is_removed = false;
        $req->save();

        return redirect('/dashboard')->with('success', 'Your request has been successfully added.');
    }

    //create schedules for testing purposes
    public function schedule ()
    {
        $value = true;
        $now = new Carbon;
        $date = $now->copy()->format('Y-m-d');
        $schedule = Schedule::where('date', $date)->get();

        return view('test-scheduler')->with('value', $value);
    }

    public function scheduler ()
    {
        $entries = 200;
        $now = new Carbon;
        $date = $now->copy()->format('Y-m-d');
        $sTime = $now->copy()->format('H:i:s');
        $eTime = $now->copy()->addHours(5)->format('H:i:s');

        for ($i = 1; $i <= $entries; $i++) { 
            $schedule = new Schedule;
            $schedule->user_id = $i;
            $schedule->date = $date;
            $schedule->start = $sTime;
            $schedule->end = $eTime;
            $schedule->branch_id = 1;
            $schedule->start_branch = 1;
            $schedule->end_branch = 1;
            $schedule->timestamps = false;
            $schedule->save();
        }

        $message = '200 entries have been created. Please use the following pins for testing today: 1000 - 1199'; 

        return redirect('/test/schedule')->with('success', $message)->with('value', true);
    }

    public function log ()
    {
        $now = new Carbon;
        $date = $now->copy()->format('Y-m-d');
        $users = User::all();

        for ($i = count($users) - 1; $i >= 0; $i--) {
            $log = Log::where('date', $date)->whereNull('punch_out_difference')->where('user_id', $users[$i]->id)->first();

            if($log != null || $users[$i]->pin == 9999){
                unset($users[$i]);
            }
        }

        return view('test-employee-logger')->with('users', $users)->with('type', 'in');
    }

    public function logOut ()
    {
        $now = new Carbon;
        $date = $now->copy()->format('Y-m-d');
        $users = User::where('logged_in', true)->get();

        return view('test-employee-logger')->with('users', $users)->with('type', 'out');
    }

    public function logger (Request $request)
    {
        $now = new Carbon;
        $date = $now->format('Y-m-d');
        
        if ($request->input('all')) {
            for ($i = 1; $i <= 200; $i++) {
                $user = User::where('id', $i)->first();

                //finding the schedule where the date is the today's date and the user id is of the pin's user
                $schedule = Schedule::where('date', $date)->where('user_id', $i)->first();
                $log = Log::whereNotNull('punch_out_difference')->where('user_id', $i)->where('date', $date)->first();

                if ($log == null) {
                    $log = Log::whereNull('punch_out_difference')->where('user_id', $i)->where('date', $date)->first();

                    //Check if the employee has already logged in or not
                    if ($log == null) { //Employee has not logged in
                        $startTime = Carbon::parse($schedule->start);
                        $user->logged_in = true;
                        $log = new Log;
                        $log->punch_in_difference = $now->diffInSeconds($startTime, false);
                        $diffInMins = gmdate("i:s", $log->punch_in_difference);

                        //will need approval of manager if employee is more than 10 mins early or late.
                        if ($diffInMins > 10) {                
                            $log->is_late = false;
                            $log->punch_in_approval = false;
                        } elseif ($diffInMins < -10) {
                            $log->is_late = true;
                            $log->punch_in_approval = false;
                        } else {
                            $log->is_late = false;
                            $log->punch_in_approval = null;
                        }

                        //need to get branch_id from device_id
                        $log->branch_id = 1;
                        $log->user_id = $i;
                        $log->date = $date;
                        $log->punch_out_difference = NULL;
                        $log->punch_out_approval = NULL;
                        $log->timestamps = false;
                        $log->save();
                        $user->save();
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

                        $user->logged_in = null;
                        $log->timestamps = false;
                        $log->save();
                        $user->save();
                    }
                }
            }
        }

        for ($i = 0; $i < 200; $i++) {
            $pin = $request->input('log_'.$i);
            
            if ($pin != null) {
                $user = User::where('pin', $pin)->first();

                //finding the schedule where the date is the today's date and the user id is of the pin's user
                $schedule = Schedule::where('date', $date)->where('user_id', $user->id)->first();
                $log = Log::whereNotNull('punch_out_difference')->where('user_id', $user->id)->where('date', $date)->first();

                if ($log == null) {
                    $log = Log::whereNull('punch_out_difference')->where('user_id', $user->id)->where('date', $date)->first();

                    //Check if the employee has already logged in or not
                    if ($log == null) { //Employee has not logged in
                        $startTime = Carbon::parse($schedule->start);
                        $user->logged_in = true;
                        $log = new Log;
                        $log->punch_in_difference = $now->diffInSeconds($startTime, false);
                        $diffInMins = gmdate("i:s", $log->punch_in_difference);

                        //will need approval of manager if employee is more than 10 mins early or late.
                        if ($diffInMins > 10) {                
                            $log->is_late = false;
                            $log->punch_in_approval = false;
                        } elseif ($diffInMins < -10) {
                            $log->is_late = true;
                            $log->punch_in_approval = false;
                        } else {
                            $log->is_late = false;
                            $log->punch_in_approval = null;
                        }

                        //need to get branch_id from device_id
                        $log->branch_id = 1;
                        $log->user_id = $user->id;
                        $log->date = $date;
                        $log->punch_out_difference = NULL;
                        $log->punch_out_approval = NULL;
                        $log->timestamps = false;
                        $log->save();
                        $user->save();
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

                        $user->logged_in = null;
                        $log->timestamps = false;
                        $log->save();
                        $user->save();
                    }
                }
            }
        }
        
        return $this->log();
    }
}
