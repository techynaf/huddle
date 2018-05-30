<?php

use Illuminate\Database\Seeder;
use Illumninate\Support\Facades\DB;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pin = 999;

        for ($i = 0; $i <= 200; $i++) {
            $pin = $pin + rand(1, 45);
            
            DB::table('users')->insert([
                'name' => str_random(rand(15, 30)),
                'pin' => $pin,
                'branch' => rand(0, 5),
            ]);
        }
    }
}
