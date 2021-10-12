<?php

namespace Database\Seeders;

use Carbon\Carbon;
use DB;
use Illuminate\Database\Seeder;

class BadgeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('badges')->insert([
            'name' => 'Beginner',
            'value' => 0,
            'created_at' => Carbon::now(),
        ]);

        DB::table('badges')->insert([
            'name' => 'Intermediate',
            'value' => 4,
            'created_at' => Carbon::now(),
        ]);

        DB::table('badges')->insert([
            'name' => 'Advanced',
            'value' => 8,
            'created_at' => Carbon::now(),
        ]);

        DB::table('badges')->insert([
            'name' => 'Master',
            'value' => 10,
            'created_at' => Carbon::now(),
        ]);
    }
}