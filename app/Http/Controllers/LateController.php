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
        if ($this->barista() || $this->hr()) {
            return redirect('/dashboard')->with('error', 'You are not authorized to access this');
        }


        $notification = $this->checkNotifications();

        if (count($notification) == 1) {
            return view('profile/manager');
        }
        
        $sun = $this->findSun(null)->addWeeks(-1);
        $today = new Carbon;
        $lates = array();
        
        if ($this->manager()) {
            $ls = Late::where('branch_id', auth()->user()->branch_id)->where('date', '>=', $sun->format('Y-m-d'))->
            where('date', '<=', $today->format('Y-m-d'))->get();

            foreach ($ls as $l) {
                if ($l->user->roles->first()->name != 'manager' || $l->user->roles->first()->name != 'assistant-manager') {
                    array_push($lates, $l);
                }
            }
        } else {
            $ls = Late::where('date', '>=', $sun->format('Y-m-d'))->where('date', '<=', $today->format('Y-m-d'))->get();

            foreach ($ls as $l) {
                if ($l->user->roles->first()->name == 'manager' || $l->user->roles->first()->name == 'assistant-manager') {
                    array_push($lates, $l);
                }
            }
        }

        $dates = array();

        for ($i = $sun->copy(); $i->copy()->format('Y-m-d') <= $today->copy()->format('Y-m-d'); $i->addDay()) {
            array_push($dates, $i->copy()->format('Y-m-d'));
        }

        return view('late/show-all')->with('lates', $lates)->with('dates', $dates)->with('notification', $notification);
    }

    public function store (Request $request, $id)
    {
        $late = Late::where('id', $id)->first();
        $late->altered_by = auth()->user()->id;
        $late->type = $request->type;
        $late->comment = $request->comment;
        $late->store;
        $late->save();

        return redirect('lates');
    }
}
