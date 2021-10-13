<?php

namespace Database\Seeders;

use Carbon\Carbon;
use DB;
use Illuminate\Database\Seeder;

class LessonTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lessons')->insert([
            'title' => 'Lesson one',
            'created_at' => Carbon::now(),
        ]);
        DB::table('lessons')->insert([
            'title' => 'Lesson Two',
            'created_at' => Carbon::now(),
        ]);
        DB::table('lessons')->insert([
            'title' => 'Lesson Tre',
            'created_at' => Carbon::now(),
        ]);
        DB::table('lessons')->insert([
            'title' => 'Lesson Four',
            'created_at' => Carbon::now(),
        ]);
        DB::table('lessons')->insert([
            'title' => 'Lesson Five',
            'created_at' => Carbon::now(),
        ]);
    }
}