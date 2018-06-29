<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class WeeklyLeavesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 201; $i++) {
            for ($j = 0; $j < 8; $j++) {
                $now = new Carbon;
                $now = $now->addWeek($j);

                DB::table('weekly_leaves')->insert([
                    'user_id' => $i,
                    'date_1' => $now->copy()->format('Y-m-d'),
                    'date_2' => $now->copy()->addDay()->format('Y-m-d'),
                    'day_1' => $now->copy()->format('l'),
                    'day_2' => $now->copy()->addDay()->format('l'),
                    'approved' => true,
                ]);
            }
        }
    }
}
