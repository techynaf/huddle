<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class HoursExport implements FromView
{
    use Exportable;
    private $branches;
    private $users;
    private $hours;
    private $weeks;

    public function __construct($branches, $users, $hours, $weeks)
    {
        $this->branches = $branches;
        $this->users = $users;
        $this->hours = $hours;
        $this->weeks = $weeks;
    }

    public function view(): View
    {
        return view('exports.hours', [
            'branches' => $this->branches,
            'users' => $this->users,
            'hours' => $this->hours,
            'weeks' => $this->weeks,
            'x' => 0
        ]);
    }
}
