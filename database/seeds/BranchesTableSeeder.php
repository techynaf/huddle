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
        $branches = array('Badda', 'Ascott', 'Dhanmondi', 'City Scape', 'LK Tower', 'Coffee Kiosk', 'Apollo',
        'AISD', 'Lakeshore', 'Baridhara');
        foreach ($branches as $branch) {
            DB::table('branches')->insert([
                'name' => $branch,
            ]);
        }
    }
}
