<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BranchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $branches = array('Roastery', 'AISD', 'Lakeshore', 'Apollo', 'Cityscape', 'LK-Tower', 'Dhanmondi',
        // 'Ascott');

        // $branches = array ('Accounts', 'HR & Admin', 'Health & Safety', 'Tech & Creative Media', 'Roastery', 'Marketing', 
        // 'Staff Training & Development', 'Supply Chain Management', 'Logistic & Distribution', 'Facilities', 'Driver', 'Cleaner',
        // 'Roastery & Cafe', 'AISD', 'Lakeshore', 'Apollo', 'Cityscape', 'L.K. Tower', 'Dhanmondi', 'Ascott', 'Pastry', 'Secrity Guard');

        // foreach ($branches as $branch) {
        //     DB::table('branches')->insert([
        //         'name' => $branch,
        //     ]);
        // }

        DB::table('branches')->insert([
            'name' => 'Office of Chairman',
            'display_name' => 'Office of Chairman',
        ]);

        DB::table('branches')->insert([
            'name' => 'Office of Executives and Directors',
            'display_name' => 'Office of Executives and Directors',
            'parent_id' => 1,
        ]);

        DB::table('branches')->insert([
            'name' => 'Roastery',
            'display_name' => 'Roastery',
            'parent_id' => 2,
        ]);

        DB::table('branches')->insert([
            'name' => 'Bakery',
            'display_name' => 'Bakery',
            'parent_id' => 2,
        ]);

        DB::table('branches')->insert([
            'name' => 'Cafes',
            'display_name' => 'Cafes',
            'parent_id' => 2,
        ]);

        DB::table('branches')->insert([
            'name' => 'Sales',
            'display_name' => 'Sales',
            'parent_id' => 2,
        ]);

        DB::table('branches')->insert([
            'name' => 'Supply Chain',
            'display_name' => 'Supply Chain',
            'parent_id' => 2,
        ]);

        DB::table('branches')->insert([
            'name' => 'Finance',
            'display_name' => 'Finance',
            'parent_id' => 2,
        ]);

        DB::table('branches')->insert([
            'name' => 'Corporate Services',
            'display_name' => 'Corporate Services',
            'parent_id' => 2,
        ]);

        DB::table('branches')->insert([
            'name' => 'Corporate Services',
            'display_name' => 'Corporate Services',
            'parent_id' => 2,
        ]);

        DB::table('branches')->insert([
            'name' => 'Area Manager',
            'display_name' => 'Area Manager',
            'parent_id' => 5,
        ]);

        DB::table('branches')->insert([
            'name' => 'Area Manager',
            'display_name' => 'Area Manager',
            'parent_id' => 5,
        ]);

        DB::table('branches')->insert([
            'name' => 'Borak',
            'display_name' => 'Borak',
            'parent_id' => 11,
        ]);

        DB::table('branches')->insert([
            'name' => 'Lotus Kamal',
            'display_name' => 'Lotus Kamal',
            'parent_id' => 11,
        ]);

        DB::table('branches')->insert([
            'name' => 'Apollo',
            'display_name' => 'Apollo',
            'parent_id' => 11,
        ]);

        DB::table('branches')->insert([
            'name' => 'Ahmed',
            'display_name' => 'Ahmed',
            'parent_id' => 11,
        ]);

        DB::table('branches')->insert([
            'name' => 'Training',
            'display_name' => 'Training',
            'parent_id' => 5,
        ]);

        DB::table('branches')->insert([
            'name' => 'AISD',
            'display_name' => 'AISD',
            'parent_id' => 12,
        ]);

        DB::table('branches')->insert([
            'name' => 'Main',
            'display_name' => 'Main',
            'parent_id' => 11,
        ]);

        DB::table('branches')->insert([
            'name' => 'Cityscape',
            'display_name' => 'Cityscape',
            'parent_id' => 12,
        ]);

        DB::table('branches')->insert([
            'name' => 'Ascott',
            'display_name' => 'Ascott',
            'parent_id' => 12,
        ]);

        DB::table('branches')->insert([
            'name' => 'Procurement',
            'display_name' => 'Procurement',
            'parent_id' => 7,
        ]);

        DB::table('branches')->insert([
            'name' => 'Inventory',
            'display_name' => 'Inventory',
            'parent_id' => 7,
        ]);

        DB::table('branches')->insert([
            'name' => 'Logistics',
            'display_name' => 'Logistics',
            'parent_id' => 7,
        ]);

        DB::table('branches')->insert([
            'name' => 'Internal Control',
            'display_name' => 'Internal Control',
            'parent_id' => 8,
        ]);

        DB::table('branches')->insert([
            'name' => 'Treasury',
            'display_name' => 'Treasury',
            'parent_id' => 8,
        ]);

        DB::table('branches')->insert([
            'name' => 'HR',
            'display_name' => 'HR',
            'parent_id' => 9,
        ]);

        DB::table('branches')->insert([
            'name' => 'IT',
            'display_name' => 'IT',
            'parent_id' => 9,
        ]);

        DB::table('branches')->insert([
            'name' => 'Facilities',
            'display_name' => 'Facilities',
            'parent_id' => 9,
        ]);

        DB::table('branches')->insert([
            'name' => 'Health & Safety',
            'display_name' => 'Health & Safety',
            'parent_id' => 9,
        ]);
    }
}
