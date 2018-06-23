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
        'AISD', 'Lakeshore', 'Baridhara', 'Accounts and Finance', 'HR and Admin', 'Marketing', 'Training',
        'IT and creative', 'Health and Safety', 'Facilities', 'Supply Chain', 'Drivers and logistics',
        'Cleaning', 'Pastry');
        foreach ($branches as $branch) {
            DB::table('branches')->insert([
                'name' => $branch,
            ]);
        }
    }
}
