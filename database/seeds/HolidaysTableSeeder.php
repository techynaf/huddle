<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Str;

class HolidaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $now = Carbon::now();

        for ($i = 0; $i <= 5; $i++) {
            DB::table('gov_holidays')->insert([
                'name' => Str::random(rand(15, 25)),
                'starting' => $now->addDays(rand(1,3))->copy()->toDateString(),
                'ending' => $now->addDays(rand(1,3))->copy()->toDateString(),
                'religion' => 'all',
            ]);
        }
    }
}
