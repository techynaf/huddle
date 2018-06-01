<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= 200; $i++) { 
            DB::table('role_user')->insert([
                'user_id' => $i,
                'role_id' => rand(2, 3),
            ]);
        }

        DB::table('role_user')->insert([
            'user_id' => 201,
            'role_id' => 4,
        ]);
    }
}
