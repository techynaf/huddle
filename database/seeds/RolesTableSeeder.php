<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'name' => 'Chairman',
        ]);

        DB::table('roles')->insert([
            'name' => 'MD',
        ]);

        DB::table('roles')->insert([
            'name' => 'COO',
        ]);

        DB::table('roles')->insert([
            'name' => 'HOD/Area Manager',
        ]);

        DB::table('roles')->insert([
            'name' => 'Manager/Assistant Manager',
        ]);

        DB::table('roles')->insert([
            'name' => 'Entry Level Employee',
        ]);
    }
}
