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
        $now = new Carbon;
        $date = $now->format('Y-m-d');
        $url = array('', '');

        for ($i = 1; $i <= 200; $i++) {
            $pin++;
            
            DB::table('users')->insert([
                'name' => 'user'.$i,
                'email' => 'user'.$i.'@test.com',        
                'phone' => 'user'.$i.'phone',
                'pin' => $pin,
                'employee_id' => 'something',
                'img_url' => '/frontend/images/users/avatar-1.jpg',
                'password' => bcrypt('bangladesh'),
                'branch_id' => rand(1, 6),
            ]);
        }

        DB::table('users')->insert([
            'name' => 'Mobashir',
            'email' => 'mobashir@techynaf.com',
            'pin' => 9999,
            'phone' => 'keno?',
            'employee_id' => 'something',
            'password' => bcrypt('bangladesh'),
            'img_url' => '/frontend/images/pic.jpg',
            'branch_id' => 6,
            'logged_in' => false,
        ]);
    }
}
