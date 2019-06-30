<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LogsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();
        for ($i = 1; $i <= 17; $i++) {
            DB::table('logs')->insert([
                'user_id' => 6,
                'date' => $now->copy()->addDays(-$i)->toDateString(),
                'start' => $now->copy()->addDays(-$i)->addHours(-4)->toDateTimeString(),
                'end' => $now->copy()->addDays(-$i)->addHours(4)->toDateTimeString(),
                'branch_id' => 5,
            ]);
        }
    }
}
