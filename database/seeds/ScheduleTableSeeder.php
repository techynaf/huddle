<?php

use Illuminate\Database\Seeder;
use Illumninate\Support\Facades\DB;

class ScheduleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $year = '2018';
        $month = rand(3, 12);
        $mins = array(00, 15, 30, 45);
        for ($i=1; $i <= 200; $i++) {
            for ($j = 1; $j <= 21; $j++) { 
                $date = $year . '-06-' . $j;
                
                $sHour = rand(10, 15);
                $sMin = $mins[rand(0, 3)];
                $start = $shour . ':' . $sMin .':00';

                $eHour = rand(($sHour + 3) , 22);
                $eMin = $mins[rand(0, 3)];
                $end = $ehour . ':' . $eMin .':00';


                DB::table('schedule')->insert([
                    'user_id' => $i,
                    'date' => $pin,
                    'start' => $start,
                    'end' => $end,
                    'branch' => rand(0, 5),
                ]);
            }
        }
    }
}
