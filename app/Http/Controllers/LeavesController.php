<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Leave;
use App\LeaveTypes;
use Carbon\Carbon;

class LeavesController extends Controller
{
    public function requestLeave ()
    {
        $types = LeaveTypes::where('id', '!=', 1)->get();
        $id = auth()->user()->id;

        return view('requests/create')->with('id', $id)->with('types', $types);
    }

    public function storeLeaveRequest (Request $request, $id)
    {
        $this->validate($request, [
            'body' => 'required',
            'type' => 'required',
            'start' => 'required',
            'end' => 'required'
        ]);

        $leave = new Leave;
        $leave->user_id = $id;
        $leave->is_approved = 0;
        $leave->subject = $request->subject;
        $leave->start = Carbon::parse($request->start)->format('Y-m-d');
        $leave->end = Carbon::parse($request->end)->format('Y-m-d');
        $leave->body = $request->body;
        $leave->type = $request->type;
        $leave->is_removed = false;
        $leave->save();

        return redirect('/dashboard')->with('success', 'Your request has been successfully added.');
    }

    public function edit (Request $request, $id)
    {
        $leave = Leave::where('id', $id)->first();
        $types = LeaveTypes::where('id', '!=', 1)->get();

        if ($leave->is_approved != 0) {
            return redirect('/')->with('error', 'You cannot edit a leave if it is not pending');
        }

        return view('requests/edit-leave')->with('leave', $leave)->with('types', $types);
    }

    public function update (Request $request, $id)
    {
        $leave = Leave::where('id', $id)->first();
        $leave->type = $request->type;
        $leave->subject = $request->subject;
        $leave->body = $request->body;
        $leave->start = Carbon::parse($request->start)->format('Y-m-d');
        $leave->end = Carbon::parse($request->end)->format('Y-m-d');
        $leave->save();

        return redirect('/')->with('success', 'Leave application successfully edited.');
    }

    public function remove (Request $request, $id)
    {
        $leave = Leave::where('id', $id)->first();
        $leave->is_removed = true;
        $leave->save();

        return redirect('/')->with('success', 'Leave application successfully removed.');
    }

    public function show ()
    {
        if (auth()->user()->roles->first()->name == 'barista') {
            return redirect('/dashboard')->with('error', 'You are not authorized to access this view');
        }

        $leaves = null;

        if (auth()->user()->roles->first()->name == 'manager') {
            $leaves = Leave::where('branch_id', auth()->user()->branch_id)->orderBy('created_at', 'desc')->get();
        } elseif (auth()->user()->roles->first()->name == 'district-manager' || auth()->user()->roles->first()->name == 'super-admin') {
            $leaves = Leave::orderBy('created_at', 'desc')->get();
        }

        return view('requests/show-leave')->with('leaves', $leaves);
    }

    public function process (Request $request, $id)
    {
        $leave = Leave::where('id', $id)->first();
        $leave->is_approved = $request->status;
        $leave->save();
        $message = 'Leave has been ';

        if ($request->status) {
            $message = $message.'approved';
        } else {
            $message = $message.'declined';
        }

        return redirect ('/view/requests')->with('success', $message);
    }
}
