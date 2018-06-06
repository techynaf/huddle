<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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

        for ($i = 1; $i <= 200; $i++) {
            $pin++;
            
            DB::table('users')->insert([
                'name' => 'user'.$i,
                'email' => 'user'.$i.'@test.com',
                'pin' => $pin,
                'password' => bcrypt('bangladesh'),
                'branch_id' => rand(0, 5),
            ]);
        }

        DB::table('users')->insert([
            'name' => 'Mobashir',
            'email' => 'mobashir@techynaf.com',
            'pin' => 9999,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 6,
            'logged_in' => false,
        ]);
    }
}
