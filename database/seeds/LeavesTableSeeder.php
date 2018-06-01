<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LeavesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 201; $i++) { 
            DB::table('leaves')->insert([
                'user_id' => $i,
                'sick_leave' => 0,
                'paid_leave' => 0,
                'unpaid_leave' => 0,
            ]);
        }
    }
}
