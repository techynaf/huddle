<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class LatesExport implements FromView
{
    use Exportable;
    private $branches;
    private $lates;
    private $duration;

    public function __construct($branches, $lates, $duration)
    {
        $this->branches = $branches;
        $this->lates = $lates;
        $this->duration = $duration;
    }

    public function view(): View
    {
        return view('exports.lates', [
            'branches' => $this->branches,
            'lates' => $this->lates,
            'duration' => $this->duration,
            'x' => 0
        ]);
    }
}
