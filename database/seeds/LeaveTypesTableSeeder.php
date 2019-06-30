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
        DB::table('leave_types')->insert([
            'name' => 'Annual',
            'ceil' => 60,
            'base' => null,
            'expiration' => null,
            'starting' => null,
            'gender' => 'all',
            'role_id' => 6,
            'is_calendar_day' => true,
            'min_notification' => 5,
            'hours' => 8,
        ]);

        DB::table('leave_types')->insert([
            'name' => 'Annual',
            'ceil' => 60,
            'base' => null,
            'expiration' => null,
            'starting' => null,
            'gender' => 'all',
            'role_id' => 5,
            'is_calendar_day' => true,
            'min_notification' => 5,
            'hours' => 8,
        ]);

        DB::table('leave_types')->insert([
            'name' => 'Annual',
            'ceil' => 60,
            'base' => null,
            'expiration' => null,
            'starting' => null,
            'gender' => 'all',
            'role_id' => 4,
            'is_calendar_day' => true,
            'min_notification' => 5,
            'hours' => 8,
        ]);

        DB::table('leave_types')->insert([
            'name' => 'Annual',
            'ceil' => 60,
            'base' => null,
            'expiration' => null,
            'starting' => null,
            'gender' => 'all',
            'role_id' => 3,
            'is_calendar_day' => true,
            'min_notification' => 5,
            'hours' => 8,
        ]);

        DB::table('leave_types')->insert([
            'name' => 'Annual',
            'ceil' => 60,
            'base' => null,
            'expiration' => null,
            'starting' => null,
            'gender' => 'all',
            'role_id' => 2,
            'is_calendar_day' => true,
            'min_notification' => 5,
            'hours' => 8,
        ]);

        DB::table('leave_types')->insert([
            'name' => 'Annual',
            'ceil' => 60,
            'base' => null,
            'expiration' => null,
            'starting' => null,
            'gender' => 'all',
            'role_id' => 1,
            'is_calendar_day' => true,
            'min_notification' => 5,
            'hours' => 8,
        ]);

        DB::table('leave_types')->insert([
            'name' => 'Casual',
            'ceil' => null,
            'base' => 11,
            'expiration' => '1 year',
            'starting' => '2020-01-31 23:59:59',
            'gender' => 'all',
            'role_id' => 6,
            'is_calendar_day' => false,
            'min_notification' => 0,
            'hours' => 8,
        ]);

        DB::table('leave_types')->insert([
            'name' => 'Casual',
            'ceil' => null,
            'base' => 11,
            'expiration' => '1 year',
            'starting' => '2020-01-31 23:59:59',
            'gender' => 'all',
            'role_id' => 5,
            'is_calendar_day' => false,
            'min_notification' => 0,
            'hours' => 8,
        ]);

        DB::table('leave_types')->insert([
            'name' => 'Casual',
            'ceil' => null,
            'base' => 11,
            'expiration' => '1 year',
            'starting' => '2020-01-31 23:59:59',
            'gender' => 'all',
            'role_id' => 4,
            'is_calendar_day' => false,
            'min_notification' => 0,
            'hours' => 8,
        ]);

        DB::table('leave_types')->insert([
            'name' => 'Casual',
            'ceil' => null,
            'base' => 11,
            'expiration' => '1 year',
            'starting' => '2020-01-31 23:59:59',
            'gender' => 'all',
            'role_id' => 3,
            'is_calendar_day' => false,
            'min_notification' => 0,
            'hours' => 8,
        ]);

        DB::table('leave_types')->insert([
            'name' => 'Casual',
            'ceil' => null,
            'base' => 11,
            'expiration' => '1 year',
            'starting' => '2020-01-31 23:59:59',
            'gender' => 'all',
            'role_id' => 2,
            'is_calendar_day' => false,
            'min_notification' => 0,
            'hours' => 8,
        ]);

        DB::table('leave_types')->insert([
            'name' => 'Casual',
            'ceil' => null,
            'base' => 11,
            'expiration' => '1 year',
            'starting' => '2020-01-31 23:59:59',
            'gender' => 'all',
            'role_id' => 1,
            'is_calendar_day' => false,
            'min_notification' => 0,
            'hours' => 8,
        ]);

        DB::table('leave_types')->insert([
            'name' => 'Sick',
            'ceil' => null,
            'base' => 14,
            'expiration' => '1 year',
            'starting' => '2020-01-31 23:59:59',
            'gender' => 'all',
            'role_id' => 6,
            'is_calendar_day' => false,
            'min_notification' => 0,
            'hours' => 8,
        ]);

        DB::table('leave_types')->insert([
            'name' => 'Sick',
            'ceil' => null,
            'base' => 14,
            'expiration' => '1 year',
            'starting' => '2020-01-31 23:59:59',
            'gender' => 'all',
            'role_id' => 5,
            'is_calendar_day' => false,
            'min_notification' => 0,
            'hours' => 8,
        ]);

        DB::table('leave_types')->insert([
            'name' => 'Sick',
            'ceil' => null,
            'base' => 14,
            'expiration' => '1 year',
            'starting' => '2020-01-31 23:59:59',
            'gender' => 'all',
            'role_id' => 4,
            'is_calendar_day' => false,
            'min_notification' => 0,
            'hours' => 8,
        ]);

        DB::table('leave_types')->insert([
            'name' => 'Sick',
            'ceil' => null,
            'base' => 14,
            'expiration' => '1 year',
            'starting' => '2020-01-31 23:59:59',
            'gender' => 'all',
            'role_id' => 3,
            'is_calendar_day' => false,
            'min_notification' => 0,
            'hours' => 8,
        ]);

        DB::table('leave_types')->insert([
            'name' => 'Sick',
            'ceil' => null,
            'base' => 14,
            'expiration' => '1 year',
            'starting' => '2020-01-31 23:59:59',
            'gender' => 'all',
            'role_id' => 2,
            'is_calendar_day' => false,
            'min_notification' => 0,
            'hours' => 8,
        ]);

        DB::table('leave_types')->insert([
            'name' => 'Sick',
            'ceil' => null,
            'base' => 14,
            'expiration' => '1 year',
            'starting' => '2020-01-31 23:59:59',
            'gender' => 'all',
            'role_id' => 1,
            'is_calendar_day' => false,
            'min_notification' => 0,
            'hours' => 8,
        ]);

        DB::table('leave_types')->insert([
            'name' => 'Maternity',
            'ceil' => null,
            'base' => 112,
            'expiration' => '1 year',
            'starting' => '2020-01-31 23:59:59',
            'gender' => 'female',
            'role_id' => 6,
            'is_calendar_day' => true,
            'min_notification' => 28,
            'hours' => 8,
        ]);

        DB::table('leave_types')->insert([
            'name' => 'Maternity',
            'ceil' => null,
            'base' => 112,
            'expiration' => '1 year',
            'starting' => '2020-01-31 23:59:59',
            'gender' => 'female',
            'role_id' => 5,
            'is_calendar_day' => true,
            'min_notification' => 28,
            'hours' => 8,
        ]);

        DB::table('leave_types')->insert([
            'name' => 'Maternity',
            'ceil' => null,
            'base' => 112,
            'expiration' => '1 year',
            'starting' => '2020-01-31 23:59:59',
            'gender' => 'female',
            'role_id' => 4,
            'is_calendar_day' => true,
            'min_notification' => 28,
            'hours' => 8,
        ]);

        DB::table('leave_types')->insert([
            'name' => 'Maternity',
            'ceil' => null,
            'base' => 112,
            'expiration' => '1 year',
            'starting' => '2020-01-31 23:59:59',
            'gender' => 'female',
            'role_id' => 3,
            'is_calendar_day' => true,
            'min_notification' => 28,
            'hours' => 8,
        ]);

        DB::table('leave_types')->insert([
            'name' => 'Maternity',
            'ceil' => null,
            'base' => 112,
            'expiration' => '1 year',
            'starting' => '2020-01-31 23:59:59',
            'gender' => 'female',
            'role_id' => 2,
            'is_calendar_day' => true,
            'min_notification' => 28,
            'hours' => 8,
        ]);

        DB::table('leave_types')->insert([
            'name' => 'Maternity',
            'ceil' => null,
            'base' => 112,
            'expiration' => '1 year',
            'starting' => '2020-01-31 23:59:59',
            'gender' => 'female',
            'role_id' => 1,
            'is_calendar_day' => true,
            'min_notification' => 28,
            'hours' => 8,
        ]);

        DB::table('leave_types')->insert([
            'name' => 'Substitute',
            'ceil' => null,
            'base' => null,
            'expiration' => '1 year',
            'starting' => '2020-01-31 23:59:59',
            'gender' => 'all',
            'role_id' => 6,
            'is_calendar_day' => true,
            'min_notification' => 5,
            'hours' => 8,
        ]);

        DB::table('leave_types')->insert([
            'name' => 'Substitute',
            'ceil' => null,
            'base' => null,
            'expiration' => '1 year',
            'starting' => '2020-01-31 23:59:59',
            'gender' => 'all',
            'role_id' => 5,
            'is_calendar_day' => true,
            'min_notification' => 5,
            'hours' => 8,
        ]);

        DB::table('leave_types')->insert([
            'name' => 'Substitute',
            'ceil' => null,
            'base' => null,
            'expiration' => '1 year',
            'starting' => '2020-01-31 23:59:59',
            'gender' => 'all',
            'role_id' => 4,
            'is_calendar_day' => true,
            'min_notification' => 5,
            'hours' => 8,
        ]);

        DB::table('leave_types')->insert([
            'name' => 'Substitute',
            'ceil' => null,
            'base' => null,
            'expiration' => '1 year',
            'starting' => '2020-01-31 23:59:59',
            'gender' => 'all',
            'role_id' => 3,
            'is_calendar_day' => true,
            'min_notification' => 5,
            'hours' => 8,
        ]);

        DB::table('leave_types')->insert([
            'name' => 'Substitute',
            'ceil' => null,
            'base' => null,
            'expiration' => '1 year',
            'starting' => '2020-01-31 23:59:59',
            'gender' => 'all',
            'role_id' => 2,
            'is_calendar_day' => true,
            'min_notification' => 5,
            'hours' => 8,
        ]);

        DB::table('leave_types')->insert([
            'name' => 'Substitute',
            'ceil' => null,
            'base' => null,
            'expiration' => '1 year',
            'starting' => '2020-01-31 23:59:59',
            'gender' => 'all',
            'role_id' => 1,
            'is_calendar_day' => true,
            'min_notification' => 5,
            'hours' => 8,
        ]);

        DB::table('leave_types')->insert([
            'name' => 'Without Pay',
            'ceil' => null,
            'base' => null,
            'expiration' => null,
            'starting' => null,
            'gender' => 'all',
            'role_id' => 6,
            'is_calendar_day' => true,
            'min_notification' => 5,
            'hours' => 0,
        ]);

        DB::table('leave_types')->insert([
            'name' => 'Without Pay',
            'ceil' => null,
            'base' => null,
            'expiration' => null,
            'starting' => null,
            'gender' => 'all',
            'role_id' => 5,
            'is_calendar_day' => true,
            'min_notification' => 5,
            'hours' => 0,
        ]);

        DB::table('leave_types')->insert([
            'name' => 'Without Pay',
            'ceil' => null,
            'base' => null,
            'expiration' => null,
            'starting' => null,
            'gender' => 'all',
            'role_id' => 4,
            'is_calendar_day' => true,
            'min_notification' => 5,
            'hours' => 0,
        ]);

        DB::table('leave_types')->insert([
            'name' => 'Without Pay',
            'ceil' => null,
            'base' => null,
            'expiration' => null,
            'starting' => null,
            'gender' => 'all',
            'role_id' => 3,
            'is_calendar_day' => true,
            'min_notification' => 5,
            'hours' => 0,
        ]);

        DB::table('leave_types')->insert([
            'name' => 'Without Pay',
            'ceil' => null,
            'base' => null,
            'expiration' => null,
            'starting' => null,
            'gender' => 'all',
            'role_id' => 2,
            'is_calendar_day' => true,
            'min_notification' => 5,
            'hours' => 0,
        ]);

        DB::table('leave_types')->insert([
            'name' => 'Without Pay',
            'ceil' => null,
            'base' => null,
            'expiration' => null,
            'starting' => null,
            'gender' => 'all',
            'role_id' => 1,
            'is_calendar_day' => true,
            'min_notification' => 5,
            'hours' => 0,
        ]);
    }
}