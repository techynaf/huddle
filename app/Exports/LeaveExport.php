<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class LeaveExport implements FromView
{
    use Exportable;
    private $leaves;

    public function __construct($leaves)
    {
        $this->leaves = $leaves;
    }

    public function view(): View
    {
        return view('exports.leaves', [
            'leaves' => $this->leaves,
        ]);
    }
}
