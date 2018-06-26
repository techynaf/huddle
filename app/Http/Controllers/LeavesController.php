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

        if (is_int(!$request->days) || $request->days <= 0) {
            return redirect('')->with('error', 'Number of cannot be decimal, negative or zero');
        }

        $this->createLeave($request);

        return redirect('/dashboard')->with('success', 'Your request has been successfully added.');
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
}
