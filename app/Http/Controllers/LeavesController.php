<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helper\LeavesHelper;
use App\LeaveBalance;
use DB;
use App\User;
use App\Leave;
use App\LeaveState;
use App\LeaveTypes;
use App\WeeklyLeave;
use App\LeavePolicy;
use App\Schedule;
use Carbon\Carbon;

class LeavesController extends Controller
{
    public function create()
    {
        $leaves = LeaveTypes::where('role_id', auth()->user()->roles->first()->id)->get();

        return view('leave.index', compact('leaves'));
    }

    public function store(Request $request)
    {
        $this->validate($request, LeavesHelper::validationArray($request));
        $helper = new LeavesHelper;
        $leave = LeaveTypes::find($request->type);
        $balance = LeaveBalance::where('user_id', auth()->user()->id)->where('type', $leave->name)->first();
        
        if ($balance == null) {
            $helper->createBalance(auth()->user());
            $balance = LeaveBalance::where('user_id', auth()->user()->id)->where('type', $leave->name)->first();
        }
        
        $policyCheckMessage = $helper->policyCheck($request);

        if (!$helper->validateData($request)) {
            $message = 'Your form failed to fulfill leave '.($helper->validateMinNotification($request->start, $leave) ? '' : 'minimum-notification-requirement').($helper->validateBalance($balance, $request) ? '' : ' minimum-balance-requirement').($helper->validateExpiration($leave, $request) ? '' : ' validity-period-requirement').'.';

            return back()->with('error', $message);
        }

        if (!$policyCheckMessage[0]) {
            return back()->with('error', $policyCheckMessage);
        }

        $messages = $helper->createStates($request);

        return redirect(route('dashboard', compact('messages')))->with('success', 'Your leave has been created');
    }

    public function types()
    {
        $types = LeaveTypes::groupBy('name')->get();
        
        return view('leave.policy.index', compact('types'));
    }

    public function showType(Request $request, $name)
    {
        $type = LeaveTypes::where('name', $name)->get();

        return view('leave.policy.show', compact('type'));
    }

    public function updateType(Request $request, $name)
    {
        $types = LeaveTypes::where('name', $name)->get();

        foreach ($types as $type) {
            $type->min_notification = $request->min_notification;
            $type->expiration = $request->exp_val.' '.$request->exp_range;
            $type->ceil = $request->ceil;
            $type->base = $request->base;
            $type->hours = $request->hours;
            $type->starting = $request->starting;
            $type->is_calendar_day = $request->is_calendar_day;
            $type->save();
        }

        return redirect(route('leaves.type', ['name' => $name]));
    }

    public function showPolicies(Request $request, LeaveTypes $type)
    {
        $policies = $type->policies;

        return view('leave.policy.policy-page', compact('type', 'policies'));
    }

    public function updatePolicies(Request $request, LeaveTypes $type)
    {
        foreach ($request->id as $key => $id) {
            if ($id != 'none') {
                if ($id != null) {
                    $policy = LeavePolicy::find($id);
                    $policy->max = $request->max[$key];
                    $policy->allow_overflow = $request->allow_overflow[$key];
                    $policy->allow_block = $request->allow_block[$key];
                    $policy->message = $request->message[$key];
                    $policy->role_id = $request->role_id[$key];
                    $policy->save();
                } else {
                    $policy = LeavePolicy::create([
                        'leave_type_id' => $type->id,
                        'role_id' => $request->role_id[$key],
                        'serial' => count($type->policies) + 1,
                        'allow_overflow' => $request->allow_overflow[$key],
                        'allow_block' => $request->allow_block[$key],
                        'message' => $request->message[$key],
                    ]);
                }
            }
        }

        return redirect(route('leaves.policies', ['type' => $type->id]));
    }

    public function deletePolicies(Request $request, LeavePolicy $policy)
    {
        $type = $policy->leaveType;
        $policy->delete();
        (new LeavesHelper)->reserializePolicy($type->id);

        return redirect(route('leaves.policies', ['type' => $type->id]));
    }

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
        $notification = $this->checkNotifications();

        if (!is_array($notification)) {
            return view('profile/manager');
        }

        $ids = LeaveState::whereNull('action')->whereIn('branch_id', auth()->user()->branch->descendent)->where('role_id', auth()->user()->roles->first()->id)->get()->pluck('leave_id')->toArray();
        $leaves = Leave::whereIn('id', $ids)->where('user_id', '!=', auth()->user()->id)->get();

        return view('requests/show-leave')->with('leaves', $leaves)->with('notification', $notification);
    }

    public function check ($ls) {
        $leaves = array ();

        if ($this->manager()) {
            foreach ($ls as $l) {
                if ($l->user->roles->first()->name == 'barista' || $l->user->roles->first()->name == 'employee' || $l->user->roles->first()->name == 'shift-supervisor') {
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
        if (auth()->user()->isShiftSuper) {
            if (!auth()->user()->isAssignedShiftSuper) {
                return back()->with('error', 'You are not the assigned shift supervisor');
            }
        }
        
        $leave = Leave::where('id', $id)->first();
        $states = $leave->statuses->where('role_id', '>=',auth()->user()->roles->first()->id);

        foreach ($states as $status) {
            if (is_null($status->user_id)) {
                $status->user_id = auth()->user()->id;
                $status->action = $request->status;
                $status->action_at = Carbon::now()->toDateTimeString();
                $status->save();
            }
        }

        if ($leave->statuses->sortByDesc('serial')->first()->action == 1) {
            $leave->is_approved = 1;
            $leave->save();

            $balance = $leave->user->leaveBalance->where('type', $leave->leaveType->name)->first();
            $balance->balance = $balance->balance - $leave->leaveCount;
            $balance->save();
        }

        if (count($leave->statuses->where('action', 2)) > 0) {
            $leave->is_approved = 2;
            $leave->save();
        }

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

        $types = LeaveTypes::groupBy('name')->get();
        $users = User::all();

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
            'id' => 'required',
            'comment' => 'nullable',
            'day_1' => 'nullable',
            'day_2' => 'nullable',
        ]);

        // if ($request->type == 6) {
        //     $this->validate($request, [
        //         'day_1' => 'required',
        //         'day_2' => 'required',
        //     ]);
        // }

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
        $leave->type = LeaveTypes::where('name', $request->type)->where('role_id', $user->roles->first()->id)->first()->id;
        $leave->start_is_half = $request->start_is_half;
        $leave->end_is_half = $request->end_is_half;
        $leave->comment = $request->comment;
        $leave->is_removed = false;
        $balance = $user->leaveBalance->where('type', LeaveTypes::where('name', $request->type)->where('role_id', $user->roles->first()->id)->first()->name)->first();

        $leave->save();

        $balance->balance = $balance->balance - (new LeavesHelper)->leaveCount($request);
        $balance->save();

        return redirect('/create/leave')->with('success', 'Leave successfully created');
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
