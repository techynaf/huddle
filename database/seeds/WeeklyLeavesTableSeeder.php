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
        $now = new Carbon;

        for ($i = 0; $i < 201; $i++) {
            $now = $now->addWeek();

            for ($j = 0; $j < 8; $j++) { 
                $now = $now->addDays($j);
                $date1 = $now->copy()->format('Y-m-d');
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
