<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
}
