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
                $date1 = $now;
                $date2 = $now->addDay();

                DB::table('weekly_leaves')->insert([
                    'user_id' => $i,
                    'date_1' => $date1->copy()->format('Y-m-d'),
                    'date_2' => $date2->copy()->format('Y-m-d'),
                    'day_1' => $date1->copy()->format('l'),
                    'day_2' => $date2->copy()->format('l'),
                    'approved' => true,
                    'clustered' => true,
                ]);
            }
        }
    }
}
