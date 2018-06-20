<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class SchedulesTableSeeder extends Seeder
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
        $sTime = $now->copy()->subHour()->format('H:i');
        $eTime = $now->copy()->addHours(5)->format('H:i');

        //test for invalid pin (1000)
        DB::table('schedules')->insert([
            'user_id' => 1,
            'date' => $date,
            'start' => $sTime.':00',
            'end' => $eTime.':00',
            'branch_id' => 0,
            'start_branch' => null,
            'end_branch' => null,
        ]);

        //test for early punch out
        DB::table('schedules')->insert([
            'user_id' => 2,
            'date' => $date,
            'start' => $sTime.':00',
            'end' => $eTime.':00',
            'branch_id' => 0,
            'start_branch' => null,
            'end_branch' => null,
        ]);
        
        $date = $now->copy()->addDay()->format('Y-m-d');
        $sTime = $now->copy()->addHour()->format('H:i');
        $eTime = $now->copy()->addHours(6)->format('H:i');

        //test for invalid schedule
        DB::table('schedules')->insert([
            'user_id' => 3,
            'date' => $date,
            'start' => $sTime.':00',
            'end' => $eTime.':00',
            'branch_id' => 0,
            'start_branch' => null,
            'end_branch' => null,
        ]);

        DB::table('schedules')->insert([
            'user_id' => 4,
            'date' => $date,
            'start' => $sTime.':00',
            'end' => $eTime.':00',
            'branch_id' => 0,
            'start_branch' => null,
            'end_branch' => null,
        ]);

        $date = $now->copy()->format('Y-m-d');
        $sTime = $now->copy()->addHour()->format('H:i');
        $eTime = $now->copy()->addHours(6)->format('H:i');

        //test for early punch in
        DB::table('schedules')->insert([
            'user_id' => 5,
            'date' => $date,
            'start' => $sTime.':00',
            'end' => $eTime.':00',
            'branch_id' => 0,
            'start_branch' => null,
            'end_branch' => null,
        ]);

        $sTime = $now->copy()->format('H:i');
        $eTime = $now->copy()->addHours(6)->format('H:i');

        //test for timely punch in
        DB::table('schedules')->insert([
            'user_id' => 6,
            'date' => $date,
            'start' => $sTime.':00',
            'end' => $eTime.':00',
            'branch_id' => 0,
            'start_branch' => null,
            'end_branch' => null,
        ]);

        $date = $now->copy()->format('Y-m-d');
        $sTime = $now->copy()->format('H:i');
        $eTime = $now->copy()->addHours(6)->format('H:i');

        for ($i = 1; $i < 201; $i++) { 
            DB::table('schedules')->insert([
                'user_id' => $i,
                'date' => $date,
                'start' => $sTime.':00',
                'end' => $eTime.':00',
                'branch_id' => 0,
                'start_branch' => null,
                'end_branch' => null,
            ]);
        }
    }
}
