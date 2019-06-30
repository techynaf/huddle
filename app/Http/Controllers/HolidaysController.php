<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GovHoliday;
use Carbon\Carbon;

class HolidaysController extends Controller
{
    public function index()
    {
        $now = Carbon::now()->toDateString();
        $holidays = GovHoliday::whereDate('starting', '>=', $now)->get();

        return view('leave.holidays.index', compact('holidays'));
    }

    public function create()
    {
        return view('leave.holidays.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'starting' => 'required',
            'ending' => 'required',
            'religion' => 'required',
        ]);

        $holiday = GovHoliday::create($request->all());

        return redirect(route('holidays.index'))->with('success', 'Public Holiday Added');
    }

    public function edit(Request $request, GovHoliday $holiday)
    {
        return view('leave.holidays.edit', compact('holiday'));
    }

    public function update(Request $request, GovHoliday $holiday)
    {
        $this->validate($request, [
            'name' => 'required',
            'starting' => 'required',
            'ending' => 'required',
            'religion' => 'required',
        ]);

        $holiday->name = $request->name;
        $holiday->starting = $request->starting;
        $holiday->ending = $request->ending;
        $holiday->religion = $request->religion;
        $holiday->save();

        return redirect(route('holidays.index'))->with('success', 'Public Holiday Updated');
    }

    public function delete(Request $request, GovHoliday $holiday)
    {
        $holiday->delete();

        return redirect(route('holidays.index'))->with('success', 'Public Holiday Removed');
    }
}
