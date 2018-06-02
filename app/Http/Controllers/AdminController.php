<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log;
use App\User;
use App\Branch;
use Carbon\Carbon;

class AdminController extends Controller
{
    public function viewLoggedIn (Request $request,  $branch)
    {
        if (auth()->user()->role == 'manager') {
            $now = new Carbon;
            $date = $now->format('Y-m-d');

            $log = Log::where('date', $date)->where('branch_id', $branch)->whereNull('punch_out_difference')->get();

            //Return a view with all those logged into that branch

            return 'A view with $log';
        } elseif (auth()->user()->role == 'admin' || auth()->user()->role == 'owner') {
            $now = new Carbon;
            $date = $now->format('Y-m-d');

            $log = Log::where('date', $date)->whereNull('punch_out_difference')->get();

            //Return a view with all those logged in all branch

            return 'A view with $log';
        } else {
            return redirect('/')->with('error', 'Sorry, you are not authorized to access this!');
        }
    }

    public function showAll ()
    {
        if (auth()->user()->role == 'super-admin' || auth()->user()->role == 'owner') {
            $users = User::all();
            $branches = Branch::all();
            $role = 'owner';

            return view('showAll')->with('users', $users)
            ->with('branches', $branches)
            ->with('role', $role);
        } elseif (auth()->user()->role == 'manager') {
            $branch = Branch::where('id', auth()->user()->branch_id)->first();
            $user = User::where('id', $id)->where('branch_id', auth()->user()->branch_id)->get();
            $role = 'manager';

            return view('showAll')->with('users', $users)
            ->with('branch', $branch)
            ->with('role', $role);
        }else {
            return redirect('/')->with('error', 'Sorry, you are not authorized to access this!');
        }
    }

    public function show (Request $request, $id)
    {
        $user = User::where('id', $id);
        
    }

    public function createSchedule (Request $request, $id)
    {
        $user = User::where('id', $id);
    }

    public function storeSchedule ()
    {
        
    }

    public function createUser ()
    {

    }

    public function storeUser ()
    {
        
    }
}
