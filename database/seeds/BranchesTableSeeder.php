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
        $branches = array('Roastery', 'AISD', 'Lakeshore', 'Apollo', 'Cityscape', 'LK Tower', 'Dhanmondi',
        'Ascott');
        foreach ($branches as $branch) {
            DB::table('branches')->insert([
                'name' => $branch,
            ]);
        }
    }
}
