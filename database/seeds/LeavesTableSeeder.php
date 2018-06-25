<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LeavesTableSeeder extends Seeder
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
        for ($i=1; $i <= 201; $i++) {
            $d = $date->copy()->addDays(rand(0,4));

            DB::table('leaves')->insert([
                'user_id' => $i,
                'type' => 1,
                'subject' => 'Default',
                'body' => 'Allowed by NE',
                'date' => $d,
                'days' => 2,
                'is_approved' => true,
            ]);
        }
    }
}
