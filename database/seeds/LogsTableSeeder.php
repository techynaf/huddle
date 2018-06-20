<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = new Carbon;
        $date = $now->format('Y-m-d');
        DB::table('logs')->insert([
            'user_id' => 2,
            'date' => $date,
            'punch_in_difference' => 0,
            'punch_out_difference' => null,
            'punch_in_approval' => null,
            'punch_out_approval' => null,
            'is_late' => false,
            'branch_id' => 1,
        ]);
    }
}
