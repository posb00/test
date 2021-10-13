<?php

namespace Database\Seeders;

use Carbon\Carbon;
use DB;
use Illuminate\Database\Seeder;

class AchievementTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        //Lessons Achievements
        DB::table('achievements')->insert([
            'name' => 'First Lesson Watched',
            'value' => 1,
            'achievements_type_id' => 1,
            'next' => 2,
            'created_at' => Carbon::now(),
        ]);
        DB::table('achievements')->insert([
            'name' => '5 Lessons Watched',
            'value' => 5,
            'achievements_type_id' => 1,
            'next' => 3,
            'created_at' => Carbon::now(),
        ]);
        DB::table('achievements')->insert([
            'name' => '10 Lessons Watched',
            'value' => 10,
            'achievements_type_id' => 1,
            'next' => 4,
            'created_at' => Carbon::now(),
        ]);
        DB::table('achievements')->insert([
            'name' => '25 Lessons Watched',
            'value' => 25,
            'achievements_type_id' => 1,
            'next' => 5,
            'created_at' => Carbon::now(),
        ]);
        DB::table('achievements')->insert([
            'name' => '50 Lessons Watched',
            'value' => 50,
            'achievements_type_id' => 1,
            'next' => null,
            'created_at' => Carbon::now(),
        ]);

        //Comments achievements
        DB::table('achievements')->insert([
            'name' => 'First Comment Written',
            'value' => 1,
            'achievements_type_id' => 2,
            'next' => 7,
            'created_at' => Carbon::now(),
        ]);
        DB::table('achievements')->insert([
            'name' => '3 Comments Written',
            'value' => 3,
            'achievements_type_id' => 2,
            'next' => 8,
            'created_at' => Carbon::now(),
        ]);
        DB::table('achievements')->insert([
            'name' => '5 Comments Written',
            'value' => 5,
            'achievements_type_id' => 2,
            'next' => 9,
            'created_at' => Carbon::now(),
        ]);
        DB::table('achievements')->insert([
            'name' => '10 Comment Written',
            'value' => 10,
            'achievements_type_id' => 2,
            'next' => 10,
            'created_at' => Carbon::now(),
        ]);
        DB::table('achievements')->insert([
            'name' => '20 Comment Written',
            'value' => 20,
            'achievements_type_id' => 2,
            'next' => null,
            'created_at' => Carbon::now(),
        ]);
    }
}