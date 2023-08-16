<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class TProjectsTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        foreach (range(1, 100) as $index) {
            DB::table('t_projects')->insert([
                'project_name' => $faker->word,
                'order_number' => $faker->unique()->numerify('Order-###'),
                'client_name' => $faker->company,
                'order_date' => $faker->dateTimeThisYear,
                'status' => $faker->numberBetween(0, 4),
                'order_income' => $faker->numberBetween(1000, 10000),
                'internal_unit_price' => $faker->numberBetween(100, 1000),
                'del_flg' => $faker->boolean ? 0 : 1,
                'created_datetime' => now(),
                'updated_datetime' => now(),
            ]);
        }
    }
}
