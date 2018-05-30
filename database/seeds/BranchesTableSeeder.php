<?php

use Illuminate\Database\Seeder;
use Illumninate\Support\Facades\DB;

class BranchesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $branches = array('Badda', 'Gulshan', 'Dhanmondi', 'Apollo', 'AISD', 'Some Other');
        foreach ($branches as $branch) {
            DB::table('branches')->insert([
                'name' => $branch,
            ]);
        }
    }
}
