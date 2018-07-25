<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Log;
use App\Late;

class LateController extends Controller
{
    public function showAll ()
    {
        $sun = $this->findSun(null);
        $sat = $this->findSat(null);

        $lates = Late::where('branch_id', auth()->user()->branch_id)->where('date', '>=', $sun->format('Y-m-d'))->
        where('date', '<=', $sat->format('Y-m-d'))->get();

        return view('late/show-all')->with('lates', $lates);
    }
}
