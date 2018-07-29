<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\User;
use App\Schedule;
use App\Log;

class ReportController extends Controller
{
    public function hours ()
    {
        if ($this->barista() || $this->manager() || $this->dm()) {
            return redirect()->with('error', 'You are not authorized to view this');
        }

        $notification = $this->checkNotifications();

        $users = User::all()->where('branch_id', '!=', 0)->groupBy('branch_id');

        return view('test')->with('notification', $notification);
    }
}
