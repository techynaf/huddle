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

        $branches = array ('Accounts', 'HR & Admin', 'Health & Safety', 'Tech & Creative Media', 'Roastery', 'Marketing', 
        'Staff Training & Development', 'Supply Chain Management', 'Logistic & Distribution', 'Facilities', 'Driver', 'Cleaner',
        'Roastery & Cafe', 'AISD', 'Lakeshore', 'Apollo', 'Cityscape', 'L.K. Tower', 'Dhanmondi', 'Ascott', 'Pastry', 'Secrity Guard');

        foreach ($branches as $branch) {
            DB::table('branches')->insert([
                'name' => $branch,
            ]);
        }
    }
}
