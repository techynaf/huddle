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
            $pin++;
            
            DB::table('users')->insert([
                'name' => 'user'.$i,
                'pin' => $pin,
                'branch' => rand(0, 5),
            ]);
        }

        DB::table('users')->insert([
            'name' => 'Mobashir',
            'pin' => 9999,
            'branch' => rand(0, 5),
        ]);
    }
}
