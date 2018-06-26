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
        $types = LeaveTypes::where('id', '!=', 1)->get();
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

        $this->create($request);

        return redirect('/dashboard')->with('success', 'Your request has been successfully added.');
    }

    public function create($request)
    {
        $leave = new Leave;
        $leave->user_id = $id;
        $leave->is_approved = null;
        $leave->subject = $request->subject;
        $leave->start = Carbon::parse($request->start)->format('Y-m-d');
        $leave->end = Carbon::parse($request->end)->format('Y-m-d');
        $leave->body = $request->body;
        $leave->type = $request->type;
        $leave->is_removed = false;
        $leave->save();
    }

    public function edit (Request $request, $id)
    {
        $leave = Leave::find($id);
        $types = LeaveTypes::where('id', '!=', 1)->get();

        if ($leave->is_approved != null) {
            return redirect('/')->with('error', 'You cannot edit a leave if it is not pending');
        }

        return view('edit-leave')->with('leave', $leave)->with('types', $types);
    }

    public function update (Request $request)
    {
        $leave = find($request->id);
        $leave->type = $request->type;
        $leave->subject = $request->subject;
        $leave->body = $request->body;
        $leave->start = Carbon::parse($request->start)->format('Y-m-d');
        $leave->end = Carbon::parse($request->end)->format('Y-m-d');
        $leave->save();

        return redirect('/')->with('error', 'Leave application successfully edited');
    }
}
