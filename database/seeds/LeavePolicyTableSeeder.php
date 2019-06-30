<?php

use Illuminate\Database\Seeder;

class LeavePolicyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('leave_policies')->insert([
            'role_id' => 5,
            'leave_type_id' => 1,
            'max' => 9,
            'serial' => 1,
            'allow_overflow' => true,
            'allow_block' => false,
            'message' => null,
        ]);

        DB::table('leave_policies')->insert([
            'role_id' => 4,
            'leave_type_id' => 1,
            'max' => null,
            'serial' => 2,
            'allow_overflow' => false,
            'allow_block' => false,
            'message' => null,
        ]);

        DB::table('leave_policies')->insert([
            'role_id' => 4,
            'leave_type_id' => 2,
            'max' => 9,
            'serial' => 1,
            'allow_overflow' => true,
            'allow_block' => false,
            'message' => null,
        ]);

        DB::table('leave_policies')->insert([
            'role_id' => 3,
            'leave_type_id' => 2,
            'max' => null,
            'serial' => 2,
            'allow_overflow' => false,
            'allow_block' => false,
            'message' => null,
        ]);

        DB::table('leave_policies')->insert([
            'role_id' => 3,
            'leave_type_id' => 3,
            'max' => 9,
            'serial' => 1,
            'allow_overflow' => true,
            'allow_block' => false,
            'message' => null,
        ]);

        DB::table('leave_policies')->insert([
            'role_id' => 2,
            'leave_type_id' => 3,
            'max' => null,
            'serial' => 2,
            'allow_overflow' => false,
            'allow_block' => false,
            'message' => null,
        ]);

        DB::table('leave_policies')->insert([
            'role_id' => 5,
            'leave_type_id' => 7,
            'max' => 2,
            'serial' => 1,
            'allow_overflow' => true,
            'allow_block' => false,
            'message' => 'Show proof to HR',
        ]);


        DB::table('leave_policies')->insert([
            'role_id' => 4,
            'leave_type_id' => 8,
            'max' => 2,
            'serial' => 1,
            'allow_overflow' => true,
            'allow_block' => false,
            'message' => 'Show proof to HR',
        ]);


        DB::table('leave_policies')->insert([
            'role_id' => 3,
            'leave_type_id' => 9,
            'max' => 2,
            'serial' => 1,
            'allow_overflow' => true,
            'allow_block' => false,
            'message' => 'Show proof to HR',
        ]);

        DB::table('leave_policies')->insert([
            'role_id' => 6,
            'leave_type_id' => 13,
            'max' => 2,
            'serial' => 1,
            'allow_overflow' => true,
            'allow_block' => false,
            'message' => null,
        ]);

        DB::table('leave_policies')->insert([
            'role_id' => 5,
            'leave_type_id' => 13,
            'max' => 5,
            'serial' => 2,
            'allow_overflow' => true,
            'allow_block' => false,
            'message' => null,
        ]);

        DB::table('leave_policies')->insert([
            'role_id' => 4,
            'leave_type_id' => 13,
            'max' => 10,
            'serial' => 3,
            'allow_overflow' => true,
            'allow_block' => false,
            'message' => null,
        ]);

        DB::table('leave_policies')->insert([
            'role_id' => 3,
            'leave_type_id' => 13,
            'max' => null,
            'serial' => 4,
            'allow_overflow' => false,
            'allow_block' => false,
            'message' => null,
        ]);

        DB::table('leave_policies')->insert([
            'role_id' => 4,
            'leave_type_id' => 17,
            'max' => 5,
            'serial' => 1,
            'allow_overflow' => true,
            'allow_block' => false,
            'message' => null,
        ]);

        DB::table('leave_policies')->insert([
            'role_id' => 3,
            'leave_type_id' => 17,
            'max' => 10,
            'serial' => 2,
            'allow_overflow' => true,
            'allow_block' => false,
            'message' => null,
        ]);

        DB::table('leave_policies')->insert([
            'role_id' => 2,
            'leave_type_id' => 17,
            'max' => null,
            'serial' => 3,
            'allow_overflow' => false,
            'allow_block' => false,
            'message' => null,
        ]);

         DB::table('leave_policies')->insert([
            'role_id' => 5,
            'leave_type_id' => 30,
            'max' => 9,
            'serial' => 1,
            'allow_overflow' => true,
            'allow_block' => false,
            'message' => null,
        ]);

         DB::table('leave_policies')->insert([
            'role_id' => 4,
            'leave_type_id' => 30,
            'max' => null,
            'serial' => 2,
            'allow_overflow' => false,
            'allow_block' => false,
            'message' => null,
        ]);

        DB::table('leave_policies')->insert([
            'role_id' => 4,
            'leave_type_id' => 29,
            'max' => 9,
            'serial' => 1,
            'allow_overflow' => true,
            'allow_block' => false,
            'message' => null,
        ]);

         DB::table('leave_policies')->insert([
            'role_id' => 3,
            'leave_type_id' => 29,
            'max' => null,
            'serial' => 2,
            'allow_overflow' => false,
            'allow_block' => false,
            'message' => null,
        ]);

        DB::table('leave_policies')->insert([
            'role_id' => 3,
            'leave_type_id' => 28,
            'max' => 9,
            'serial' => 1,
            'allow_overflow' => true,
            'allow_block' => false,
            'message' => null,
        ]);

         DB::table('leave_policies')->insert([
            'role_id' => 2,
            'leave_type_id' => 28,
            'max' => null,
            'serial' => 2,
            'allow_overflow' => false,


            'allow_block' => false,
            'message' => null,
        ]);
    }
}
