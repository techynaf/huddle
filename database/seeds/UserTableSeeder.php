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

        for ($i = 1; $i <= 200; $i++) {
            $pin++;
            
            DB::table('users')->insert([
                'name' => 'user'.$i,
                'email' => 'user'.$i.'@test.com',        
                'phone' => 'user'.$i.'phone',
                'address' => 'user'.$i.'address',
                'pin' => $pin,
                'religion' => 'doesnt matter',
                'joining_date' => $date,
                'employee_id' => 'something',
                'category' => 'something',
                'status' => 'something',
                'title' => 'something',
                'password' => bcrypt('bangladesh'),
                'branch_id' => rand(0, 5),
            ]);
        }

        DB::table('users')->insert([
            'name' => 'Mobashir',
            'email' => 'mobashir@techynaf.com',
            'pin' => 9999,
            'phone' => 'keno?',
            'address' => 'komuna',
            'password' => bcrypt('bangladesh'),
            'religion' => 'doesnt matter',
            'joining_date' => $date,
            'employee_id' => 'something',
            'category' => 'something',
            'status' => 'something',
            'title' => 'something',
            'branch_id' => 6,
            'logged_in' => false,
        ]);
    }
}
