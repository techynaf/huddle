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
            $now = new Carbon;

            DB::table('weekly_leaves')->insert([
                'user_id' => $i,
                'start' => $now->copy()->addWeeks(-5)->format('Y-m-d'),
                'end' => $now->copy()->addWeeks(5)->format('Y-m-d'),
                'day_1' => $now->copy()->format('l'),
                'day_2' => $now->copy()->addDay()->format('l'),
                'approved' => true,
            ]);
        }
    }
}
