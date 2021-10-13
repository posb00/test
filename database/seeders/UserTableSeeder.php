<?php

namespace Database\Seeders;

use Carbon\Carbon;
use DB;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Alexander De Los Santos',
            'email' => 'posb00@gmail.com',
            'password' => bcrypt('123456'),
            'created_at' => Carbon::now(),
        ]);
    }
}