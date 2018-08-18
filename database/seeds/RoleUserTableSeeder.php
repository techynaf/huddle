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
        DB::table('role_user')->insert([
            'user_id' => 1,
            'role_id' => 1,
        ]);
        DB::table('role_user')->insert([
            'user_id' => 2,
            'role_id' => 2,
        ]);
        DB::table('role_user')->insert([
            'user_id' => 3,
            'role_id' => 3,
        ]);

        for ($i = 4; $i <= 92; $i++) {
            DB::table('role_user')->insert([
                'user_id' => $i,
                'role_id' => 7,
            ]);
        }
    }
}
