<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class MUsersTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 100) as $index) {
            DB::table('m_users')->insert([
                'user_name' => $faker->userName,
                'password' => bcrypt('secret'), // you can use $faker->password for random passwords
                'role' => $faker->boolean ? 0 : 1,
                'del_flg' => $faker->boolean ? 0 : 1,
                'created_datetime' => now(),
                'updated_datetime' => now(),
            ]);
        }
    }
}
