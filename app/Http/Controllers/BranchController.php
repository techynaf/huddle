<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Branch;

class BranchController extends Controller
{
    public function show ()
    {
        $branches = Branch::all();

        return view('branch/show')->with('branches', $branches);
    }
}
