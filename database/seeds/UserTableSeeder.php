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
        DB::table('users')->insert([
            'name' => 'Super Admin',
            'pin' => 1234567890,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 0,
            'employee_id' => 'something unique',
            'religion' => 'really?',
        ]);

        DB::table('users')->insert([
            'name' => 'HR',
            'pin' => 109876,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 0,
            'employee_id' => 'something unique 2',
            'religion' => 'really?',
        ]);

        DB::table('users')->insert([
            'name' => 'District Manager',
            'pin' => 543210,
            'password' => bcrypt('bangladesh'),
            'branch_id' => 0,
            'employee_id' => 'something unique 3',
            'religion' => 'really?',
        ]);
    }
}
