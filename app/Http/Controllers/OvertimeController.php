<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Overtime;
use App\Log;
use App\User;
use Carbon\Carbon;

class OvertimeController extends Controller
{
    public function index (Request $request)
    {
        $flag = true;
        $logs = Log::whereIn('branch_id', ($request->branch == null ? auth()->user()->branch->descendent : [$request->branch]))
        ->get();

        if (!is_null($request->from)) {
            $logs = $logs->where('date', '>=', $request->from);
            $flag = false;
        }

        if (!is_null($request->to)) {
            $logs = $logs->where('date', '<=', $request->to);
            $flag = false;
        }

        if ($flag) {
            $logs = $logs->where('date', '>=', Carbon::now()->addMonths(-1)->toDateTimeString());
        }

        $overtimes = Overtime::whereIn('id', $logs->pluck('id')->toArray())->orderBy('created_at', 'DESC')->get();

        return view('overtime.index', compact('overtimes'));
    }

    public function action(Request $request)
    {
        $overtime = Overtime::find($request->id);
        $overtime->action = $request->action;
        $overtime->action_at = Carbon::now()->toDateTimeString();
        $overtime->save();

        return back()->with('success', 'Overtime as been '.($request->action > 0 ? 'approved' : 'declined'));
    }

    public function weekly(Request $request)
    {
        $start = $this->findSun(null);
        $users = User::whereIn('branch_id', auth()->user()->branch->descendent)->get();

        if (!is_null($request->from)) {
            $start = Carbon::parse($request->from);
            $start = $this->findSun($start);
        }

        if (!is_null($request->branch)) {
            $users = User::where('branch_id', $request->branch)->get();
        }


        return view('report.overtime.weekly', compact('users', 'start'));
    }
}
