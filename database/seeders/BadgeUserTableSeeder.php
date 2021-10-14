<?php

namespace Database\Seeders;
use DB;
use Carbon\Carbon;

use Illuminate\Database\Seeder;

class BadgeUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('badge_user')->insert([
            'user_id' => 1,
            'badge_id' => 1,
            'earned_at' => Carbon::now(),
        ]);
    }
}
