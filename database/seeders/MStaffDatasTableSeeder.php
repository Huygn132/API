<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class MStaffDatasTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 100) as $index) {
            DB::table('m_staff_datas')->insert([
                'last_name' => $faker->lastName,
                'first_name' => $faker->firstName,
                'last_name_furigana' => $faker->lastName,
                'first_name_furigana' => $faker->firstName,
                'staff_type' => $faker->boolean ? 0 : 1,
                'del_flg' => $faker->boolean ? 0 : 1,
                'created_datetime' => now(),
                'updated_datetime' => now(),
            ]);
        }
    }
}
