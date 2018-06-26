<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Leave;
use App\LeaveTypes;

class LeavesController extends Controller
{
    public function requestLeave ()
    {
        $types = LeaveTypes::all();
        $id = auth()->user()->id;

        return view('request')->with('id', $id)->with('types', $types);
    }

    public function storeLeaveRequest (Request $request, $id)
    {
        $this->validate($request, [
            'subject' => 'required',
            'body' => 'required',
            'type' => 'required',
            'days' => 'required'
        ]);

        if ($request->type == 1) {
            //return view with option to edit/delete current leaves or create new weekly leave
        }

        $this->createLeave($request);

        return redirect('/dashboard')->with('success', 'Your request has been successfully added.');
    }

    public function weeklyLeave ($request)
    {
        if($request->days > 2){
            return redirect('/dashboard')->with('error', "You can only have two days off per week");
        }
        
        $start = Carbon::parse($request->date);

        while(Carbon::parse($request->date)->format('l') != 'Sunday') {
            $start->addDays(-1);
        }

        $end = $start->addDays(6);

        $leaves = Leave::where('user_id', $request->user_id)->where('date', '>=', $start)->
        where('date', '<=', $end)->where('type', 1)->get();

        $x = array($request->id, $request->subject, $request->date, $request->days, $request->body, $request->type);
        

        $this->createLeave();
    }

    public function createLeave($request)
    {
        $leave = new Leave;
        $leave->user_id = $id;
        $leave->is_approved = null;
        $leave->subject = $request->subject;
        $leave->date = Carbon::parse($request->date)->format('Y-m-d');
        $leave->days = $request->days - 1;
        $leave->body = $request->body;
        $leave->type = $request->type;
        $leave->is_removed = false;
        $leave->save();
    }

    public function weeklyChange ($request)
    {
        
    }
}
