<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class LessonUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lesson_user')->insert([
            'user_id' => 1,
            'lesson_id' => 1,
        ]);
        DB::table('lesson_user')->insert([
            'user_id' => 1,
            'lesson_id' => 2,
        ]);
        DB::table('lesson_user')->insert([
            'user_id' => 1,
            'lesson_id' => 3,
        ]);
        DB::table('lesson_user')->insert([
            'user_id' => 1,
            'lesson_id' => 4,
        ]);
        DB::table('lesson_user')->insert([
            'user_id' => 1,
            'lesson_id' => 5,
        ]);
    }
}