<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Leave;
use App\LeaveTypes;
use App\WeeklyLeave;
use Carbon\Carbon;

class LeavesController extends Controller
{
    public function requestLeave (Request $request)
    {
        if ($this->superAdmin() || $this->hr()) {
            return redirect('/')->with('error', 'Super-admin and HR cannot request for leaves.');
        }
        
        $notification = $this->checkNotifications();

        if (!is_array($notification)) {
            return view('profile/manager');
        }

        $types = LeaveTypes::where('id', '!=', 1)->get();
        $id = auth()->user()->id;

        return view('requests/create')->with('id', $id)->with('types', $types)->with('notification', $notification);
    }

    public function storeLeaveRequest (Request $request, $id)
    {
        $this->validate($request, [
            'type' => 'required',
            'start' => 'required',
            'end' => 'required'
        ]);

        $leave = new Leave;
        $leave->user_id = $id;
        $leave->branch_id = auth()->user()->branch_id;
        $leave->is_approved = 0;
        $leave->start = Carbon::parse($request->start)->format('Y-m-d');
        $leave->end = Carbon::parse($request->end)->format('Y-m-d');
        $leave->type = $request->type;
        $leave->comment = $request->comment;
        $leave->is_removed = false;
        $leave->save();

        return redirect('/dashboard')->with('success', 'Your request has been successfully added, waiting for approval.');
    }

    public function edit (Request $request, $id)
    {
        $notification = $this->checkNotifications();

        if (!is_array($notification)) {
            return view('profile/manager');
        }

        $leave = Leave::where('id', $id)->first();
        $types = LeaveTypes::where('id', '!=', 1)->get();

        if (auth()->user()->id != $leave->user->id) {
            return redirect('/')->with('You are not authorized to make changes to others request');
        }

        if ($leave->is_approved != 0) {
            return redirect('/')->with('error', 'You cannot edit a leave if it is not pending');
        }

        return view('requests/edit-leave')->with('leave', $leave)->with('types', $types)->with('notification', $notification);
    }

    public function update (Request $request, $id)
    {
        $leave = Leave::where('id', $id)->first();

        if (auth()->user()->id != $leave->user->id) {
            return redirect('/')->with('You are not authorized to make changes to others request');
        }

        $leave->type = $request->type;
        $leave->start = Carbon::parse($request->start)->format('Y-m-d');
        $leave->end = Carbon::parse($request->end)->format('Y-m-d');
        $leave->comment = $request->comment;
        $leave->save();

        return redirect('/dashboard')->with('success', 'Leave application successfully edited.');
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
        if ($this->barista() || $this->hr()) {
            return redirect('/dashboard')->with('error', 'You are not authorized to access this view');
        }

        $notification = $this->checkNotifications();

        if (!is_array($notification)) {
            return view('profile/manager');
        }

        $leaves = array();

        if ($this->manager()) {
            $leaves = Leave::where('branch_id', auth()->user()->branch_id)->orderBy('created_at', 'desc')->
            where('is_removed', false)->get();
        } else {
            $leaves = Leave::orderBy('created_at', 'desc')->where('is_removed', false)->get();
        }

        $leaves = $this->check($leaves);

        return view('requests/show-leave')->with('leaves', $leaves)->with('notification', $notification);
    }

    public function check ($ls) {
        $leaves = array ();

        if ($this->manager()) {
            foreach ($ls as $l) {
                if ($l->user->roles->first()->name != 'manager' || $l->user->roles->first()->name != 'assistant-manager') {
                    array_push($leaves, $l);
                }
            }
        } elseif ($this->dm()) {
            foreach ($ls as $l) {
                if ($l->user->roles->first()->name == 'manager' || $l->user->roles->first()->name == 'assistant-manager') {
                    array_push($leaves, $l);
                }
            }
        } else {
            foreach ($ls as $l) {
                if ($l->user->roles->first()->name == 'manager' || $l->user->roles->first()->name == 'assistant-manager' || $l->user->roles->first()->name == 'district-manager') {
                    array_push($leaves, $l);
                }
            }
        }

        return $leaves;
    }

    public function process (Request $request, $id)
    {
        if ($this->barista() || $this->hr()) {
            return redirect('/dashboard')->with('error', 'You are not authorized to access this view');
        }
        
        $leave = Leave::where('id', $id)->first();
        $leave->is_approved = $request->status;
        $leave->save();
        $message = 'Leave has been ';

        if ($request->status == 1) {
            $message = $message.'approved';
        } else {
            $message = $message.'declined';
        }

        return redirect ('/view/requests')->with('success', $message);
    }

    public function type ()
    {
        $notification = $this->checkNotifications();

        if (!is_array($notification)) {
            return view('profile/manager');
        }

        return view('requests/type')->with('notification', $notification);
    }

    public function range (Request $request, $type)
    {
        $notification = $this->checkNotifications();

        if (!is_array($notification)) {
            return view('profile/manager');
        }
        
        $type = LeaveTypes::where('name', $type)->first();
        $type = $type->id;

        return view('requests/range')->with('notification', $notification)->with('type', $type);
    }

    public function createLeave ()
    {
        if ($this->barista()) {
            return redirect('/')->with('error', 'You are not authorized to access this view.');
        }

        $notification = $this->checkNotifications();

        if (!is_array($notification)) {
            return view('profile/manager');
        }

        $types = LeaveTypes::where('id', '!=', 1)->get();
        $users = User::where('branch_id', '>=', 1)->get();

        if ($this->manager()) {
            $users = DB::table("users")->whereIn('id', function ($query) {
                $query->from("role_user")
                    ->where("role_id", '>=',6)
                    ->select("user_id");
            })->where('branch_id', auth()->user()->branch_id)->get();
        }

        return view('requests/issue')->with('notification', $notification)->with('users', $users)->with('types', $types);
    }

    public function storeLeave (Request $request)
    {
        $this->validate($request, [
            'type' => 'required',
            'start' => 'required',
            'end' => 'required',
            'id' => 'required'
        ]);

        $l = Leave::where('user_id', $request->id)->where('start', '<=', Carbon::parse($request->start)->format('Y-m-d'))->
        where('end', '>=', Carbon::parse($request->end)->format('Y-m-d'))->where('is_approved', 1)->get();

        if (count($l) != 0) {
            return redirect('/create/leave')->with('error', 'Employee already has a leave in that range');
        }

        $user = User::find($request->id);
        $leave = new Leave;
        $leave->user_id = $user->id;
        $leave->branch_id = $user->branch_id;
        $leave->is_approved = 1;
        $leave->start = Carbon::parse($request->start)->format('Y-m-d');
        $leave->end = Carbon::parse($request->end)->format('Y-m-d');
        $leave->type = $request->type;
        $leave->comment = $request->comment;
        $leave->is_removed = false;
        $leave->save();

        $url = '/view/employee/'.$user->id;

        return redirect($url)->with('success', 'Leave successfully created');
    }

    public function delete ($id)
    {
        $leave = Leave::find($id);
        $user = $leave->user;
        $leave->delete();

        if ($this->admin()) {
            $url = '/view/employee/'.$user->id;

            return redirect($url)->with('success', 'Leave deleted');
        } else {
            return redirect('/dashboard')->with('success', 'Leave deleted');
        }
    }
}
