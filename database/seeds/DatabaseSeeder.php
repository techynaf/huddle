<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            BranchesTableSeeder::class,
            UserTableSeeder::class,
            LeaveTypesTableSeeder::class,
            LogsTableSeeder::class,
            RolesTableSeeder::class,
            RoleUserTableSeeder::class,
            DesignationTableSeeder::class,
            LeavePolicyTableSeeder::class,
            HolidaysTableSeeder::class,
        ]);
    }
}
