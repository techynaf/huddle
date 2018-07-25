<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Carbon\Carbon;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function findSun ($date)
    {
        if ($date == null) {
            $date = new Carbon;
        }

        if ($date->copy()->format('l') == 'Sunday') {
            return $date;
        }

        while ($date->copy()->format('l') != 'Sunday') {
            $date = $date->addDays(-1);
        }

        return $date;
    }

    public function findSat ($date)
    {
        if ($date == null) {
            $date = new Carbon;
        }

        if ($date->copy()->format('l') == 'Saturday') {
            return $date;
        }

        while ($date->copy()->format('l') != 'Saturday') {
            $date = $date->addDays(1);
        }

        return $date;
    }
}
