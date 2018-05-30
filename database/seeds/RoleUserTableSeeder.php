<?php

use Illuminate\Database\Seeder;
use Illumninate\Support\Facades\DB;

class RoleUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=0; $i < 200; $i++) { 
            DB::table('role_user')->insert([
                'user_id' => $i,
                'role_id' => rand(0, 3),
            ]);
        }
    }
}
