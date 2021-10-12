<?php

namespace Database\Seeders;

use Carbon\Carbon;
use DB;
use Illuminate\Database\Seeder;

class AchievementTypeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('achievements_types')->insert([
            'name' => 'Lessons Watched Achievements',
            'created_at' => Carbon::now(),
        ]);
        DB::table('achievements_types')->insert([
            'name' => 'Comments Written Achievements',
            'created_at' => Carbon::now(),
        ]);
    }
}