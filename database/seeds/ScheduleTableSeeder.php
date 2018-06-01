<?php

use Illuminate\Database\Seeder;
use Illumninate\Support\Facades\DB;
use Carbon\Carbon;

class ScheduleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = new Carbon;
        $date = $now->copy()->format('Y-m-d');
        $sTime = $now->copy()->format('H:i')->subHour();
        $eTime = $now->copy()->format('H:i')->addHours(5);

        //test for invalid pin (1000)
        DB::table('schedule')->insert([
            'user_id' => 1,
            'date' => $date,
            'start' => $sTime,
            'end' => $eTime,
            'branch_id' => 0,
        ]);

        //test for early punch out
        DB::table('schedule')->insert([
            'user_id' => 2,
            'date' => $date,
            'start' => $sTime,
            'end' => $eTime,
            'branch_id' => 0,
        ]);
        
        $date = $now->copy()->addDay()->format('Y-m-d');
        $sTime = $now->copy()->format('H:i')->addHour();
        $eTime = $now->copy()->format('H:i')->addHours(6);

        //test for invalid schedule
        DB::table('schedule')->insert([
            'user_id' => 3,
            'date' => $date,
            'start' => $sTime,
            'end' => $eTime,
            'branch_id' => 0,
        ]);

        DB::table('schedule')->insert([
            'user_id' => 4,
            'date' => $date,
            'start' => $sTime,
            'end' => $eTime,
            'branch_id' => 0,
        ]);

        $date = $now->copy()->format('Y-m-d');
        $sTime = $now->copy()->format('H:i')->addHour();
        $eTime = $now->copy()->format('H:i')->addHours(6);

        //test for early punch in
        DB::table('schedule')->insert([
            'user_id' => 5,
            'date' => $date,
            'start' => $sTime,
            'end' => $eTime,
            'branch_id' => 0,
        ]);

        $sTime = $now->copy()->format('H:i');
        $eTime = $now->copy()->format('H:i')->addHours(6);

        //test for timely punch in
        DB::table('schedule')->insert([
            'user_id' => 6,
            'date' => $date,
            'start' => $sTime,
            'end' => $eTime,
            'branch_id' => 0,
        ]);
    }
}
