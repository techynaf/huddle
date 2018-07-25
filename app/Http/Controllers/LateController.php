<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Log;
use App\Late;

class LateController extends Controller
{
    public function showAll ()
    {
        $sat = $this->findSat(null);
        $sun = $this->findSun(null);
        $lates = Late::where('branch_id', auth()->user()->branch_id)->where('date', '>=', $sun->format('Y-m-d'))->
        where('date', '<=', $sat->format('Y-m-d'))->get();
        $dates = array();

        for ($i = $sun->copy(); $i->copy()->format('Y-m-d') <= $sat->copy()->format('Y-m-d'); $i->addDay()) {
            array_push($dates, $i->copy()->format('Y-m-d'));
        }

        return view('late/show-all')->with('lates', $lates)->with('dates', $dates);
    }

    public function show (Request $request, $id)
    {
        $late = Late::where('id', $id)->first();

        return view('comment')->with('late', $late);
    }
}
