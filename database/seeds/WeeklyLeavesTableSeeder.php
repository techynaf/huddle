<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                $now = $now->addDays($j);
                $date1 = $now->copy()->format('Y-m-d');
                $date2 = $now->addDay()->copy()->format('Y-m-d');

                DB::table('weekly_leaves')->insert([
                    'user_id' => $i,
                    'date_1' => $date1,
                    'date_2' => $date,
                    'is_approved' => true,
                    'is_clustured' => true,
                ]);
            }
        }
    }
}
