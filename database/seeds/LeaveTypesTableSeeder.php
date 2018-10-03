<?php

use Illuminate\Database\Seeder;

class LeaveTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = array('Weekly', 'Sick Leave', 'Annual', 'Government Holiday', 'Casual');

        foreach ($types as $type) {
            DB::table('leave_types')->insert([
                'name' => $type,
            ]);
        }
    }
}
