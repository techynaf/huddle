<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
        $url = array('', '');
        $rel = array('Islam', 'Hinduism', 'Buddhism', 'Christianity', 'Sikhism');

        for ($i = 1; $i <= 200; $i++) {
            $pin++;
            
            DB::table('users')->insert([
                'name' => 'user'.$i,
                'pin' => $pin,
                'employee_id' => 'something'.$i,
                'religion' => $rel[rand(0, 4)],
                'img_url' => '/frontend/images/users/avatar-1.jpg',
                'password' => bcrypt('bangladesh'),
                'branch_id' => rand(1, 6),
            ]);
        }

        DB::table('users')->insert([
            'name' => 'Mobashir',
            'pin' => 9999,
            'employee_id' => 'something',
            'password' => bcrypt('bangladesh'),
            'img_url' => '/frontend/images/pic.jpg',
            'branch_id' => 6,
            'logged_in' => false,
        ]);
    }
}
