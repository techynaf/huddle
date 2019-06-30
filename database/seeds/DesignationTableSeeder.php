<?php

use Illuminate\Database\Seeder;

class DesignationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('designations')->insert([
            'name' => 'Chairman',
            'role_id' => 1,
        ]);

        DB::table('designations')->insert([
            'name' => 'MD',
            'role_id' => 2,
        ]);

        DB::table('designations')->insert([
            'name' => 'COO',
            'role_id' => 3,
        ]);

        DB::table('designations')->insert([
            'name' => 'HOD',
            'role_id' => 4,
        ]);

        DB::table('designations')->insert([
            'name' => 'Area Manager',
            'role_id' => 4,
        ]);

        DB::table('designations')->insert([
            'name' => 'Manager',
            'role_id' => 5,
        ]);

        DB::table('designations')->insert([
            'name' => 'Assistant Manager',
            'role_id' => 5,
        ]);

        DB::table('designations')->insert([
            'name' => 'Shift Supervisor',
            'role_id' => 6,
        ]);

        DB::table('designations')->insert([
            'name' => 'Barista',
            'role_id' => 6,
        ]);

        DB::table('designations')->insert([
            'name' => 'Cafe Assistant',
            'role_id' => 6,
        ]);

        DB::table('designations')->insert([
            'name' => 'Cleaner',
            'role_id' => 6,
        ]);

        DB::table('designations')->insert([
            'name' => 'Guard',
            'role_id' => 6,
        ]);

        DB::table('designations')->insert([
            'name' => 'Employee',
            'role_id' => 6,
        ]);
    }
}
