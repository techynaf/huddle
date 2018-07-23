<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Branch;
use App\User;

class BranchController extends Controller
{
    public function show ()
    {
        $branches = Branch::all();

        return view('branch/show')->with('branches', $branches);
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
        $branches = Branch::all();

        return view('branch/delete')->with('branches', $branches);
    }

    public function destroy (Request $request)
    {
        $branch = Branch::where('id', $request->id);
        $branch->delete();

        $users = User::where('branch_id', $request->id)->get();
        
        foreach ($users as $user) {
            $user->branch_id = $request->shift;
            $user->save();
        }

        return redirect('/branch')->with('success', 'Branch Deleted');
    }

    public function details (Request $request, $id)
    {

    }
}
