<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            // UserTableSeeder::class,
            AchievementTypeTableSeeder::class,
            AchievementTableSeeder::class,
            BadgeTableSeeder::class,
            LessonTableSeeder::class,
            LessonUserTableSeeder::class,
            //BadgeUserTableSeeder::class,
        ]);
    }
}