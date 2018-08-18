<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Branch;
use App\User;
use App\Role;

class BranchController extends Controller
{
    public function showAll ()
    {
        if ($this->barista() || $this->manager()) {
            return redirect('/')->with('error', 'You are not authorized to access this page');
        }

        $notification = $this->checkNotifications();

        if (count($notification) == 1) {
            return view('profile/manager');
        }

        $branches = Branch::all();
        $unassigned = User::where('branch_id', 0)->get();
        $managers  = array();
        $assistant_managers = array();
        $supervisors = array();

        foreach ($branches as $branch) {
            $sup = array();
            $man = array();
            $as = array();
            $m = 0;
            $a = 0;
            $s = 0;

            foreach ($branch->users as $user) {
                if ($user->roles->first()->name == 'manager') {
                    array_push($man, $user);
                    $m++;
                }

                if ($user->roles->first()->name == 'assistant-manager') {
                    array_push($as, $user);
                    $a++;
                }

                if ($user->roles->first()->name == 'shift-supervisor') {
                    array_push($sup, $user);
                    $s++;
                }
            }

            if ($m == 0) {
                array_push($managers, null);
            } else {
                array_push($managers, $man);
            }

            if ($a == 0) {
                array_push($assistant_managers, null);
            } else {
                array_push($assistant_managers, $as);
            }

            if ($s > 0) {
                array_push($supervisors, $sup);
            } else {
                array_push($supervisors, null);
            }
        }
        
        return view('branch/show-all')->with('branches', $branches)->with('unassigned', $unassigned)->
        with('notification', $notification)->with('managers', $managers)->with('assistant_managers', $assistant_managers)->
        with('supervisors', $supervisors);
    }

    public function create ()
    {
        if ($this->barista() || $this->manager()) {
            return redirect('/')->with('error', 'You are not authorized to access this page');
        }

        $notification = $this->checkNotifications();

        if (count($notification) == 1) {
            return view('profile/manager');
        }

        return view('branch/create')->with('notification', $notification);
    }

    public function store (Request $request)
    {
        if ($this->barista() || $this->manager() || $this->dm()) {
            return redirect('/')->with('error', 'You are not authorized to access make this change');
        }

        $branch = new Branch;
        $branch->name = $request->name;
        $branch->timestamps = false;
        $branch->save();
        
        return redirect('/branch')->with('success', 'Branch Created');
    }

    public function delete (Request $request)
    {
        if ($this->barista() || $this->manager()) {
            return redirect('/')->with('error', 'You are not authorized to access this page');
        }

        $notification = $this->checkNotifications();

        if (count($notification) == 1) {
            return view('profile/manager');
        }

        $branches = Branch::all();

        return view('branch/delete')->with('branches', $branches)->with('notification', $notification);
    }

    public function destroy (Request $request)
    {
        if ($this->barista() || $this->manager() || $this->dm()) {
            return redirect('/')->with('error', 'You are not authorized to access make this change');
        }
        
        $branch = Branch::where('id', $request->id);
        $branch->delete();

        $users = User::where('branch_id', $request->id)->get();
        
        foreach ($users as $user) {
            $user->branch_id = 0;
            $user->save();
        }

        return redirect('/branch')->with('success', 'Branch Deleted');
    }

    public function show (Request $request, $id)
    {
        if ($this->barista() || $this->manager()) {
            return redirect('/')->with('error', 'You are not authorized to access this page');
        }

        $notification = $this->checkNotifications();

        if (count($notification) == 1) {
            return view('profile/manager');
        }
        
        $branches = Branch::all();
        $roles = Role::where('name', '!=', 'super-admin')->where('name', '!=', 'HR')->where('name', '!=', 'district-manager')->get();
        $users = User::where('branch_id', $id)->get();

        if ($id == 0) {
            $branch = 'Unassigned';
        } else {
            $branch = Branch::where('id', $id)->first();
        }

        if ($this->hr() || $this->dm()) {
            if ($this->hr()) {
                return view('branch/show')->with('branch', $branch)->with('branches', $branches)->with('roles', $roles)->
                with('users', $users)->with('flow', false)->with('notification', $notification);
            } else {
                return view('branch/show')->with('branch', $branch)->with('branches', $branches)->with('roles', $roles)->
                with('users', $users)->with('flow', true)->with('notification', $notification);
            }
        }

        if ($request->flow == null) {
            return view('branch/show')->with('branch', $branch)->with('branches', $branches)->with('roles', $roles)->
            with('users', $users)->with('flow', true)->with('notification', $notification);
        } else {
            return view('branch/show')->with('branch', $branch)->with('branches', $branches)->with('roles', $roles)->
            with('users', $users)->with('flow', $request->flow)->with('notification', $notification);
        }
    }
}
