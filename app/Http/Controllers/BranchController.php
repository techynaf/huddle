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
        $notification = $this->checkNotifications();
        $branches = Branch::all();
        $unassigned = User::where('branch_id', 0)->get();

        return view('branch/show-all')->with('branches', $branches)->with('unassigned', $unassigned)->
        with('notification', $notification);
    }

    public function create ()
    {
        return view('branch/create');
    }

    public function store (Request $request)
    {
        $branch = new Branch;
        $branch->name = $request->name;

        return redirect('/branch')->with('success', 'Branch Created');
    }

    public function delete (Request $request)
    {
        $notification = $this->checkNotifications();
        $branches = Branch::all();

        return view('branch/delete')->with('branches', $branches)->with('notification', $notification);
    }

    public function destroy (Request $request)
    {
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
        $notification = $this->checkNotifications();
        $branches = Branch::all();
        $roles = Role::all();
        $users = User::where('branch_id', $id)->get();

        if ($id == 0) {
            $branch = 'Unassigned';
        } else {
            $branch = Branch::where('id', $id)->first();
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
