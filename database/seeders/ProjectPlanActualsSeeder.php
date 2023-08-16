<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProjectPlanActualsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 100; $i++) {
            DB::table('t_project_plan_actuals')->insert([
                'project_id' => rand(1, 100),
                'staff_id' => rand(1, 100),
                'this_year_4_plan' => rand(1, 1000),
                'this_year_4_actual' => rand(1, 1000),
                'this_year_5_plan' => rand(1, 1000),
                'this_year_5_actual' => rand(1, 1000),
                'this_year_6_plan' => rand(1, 1000),
                'this_year_6_actual' => rand(1, 1000),
                'this_year_7_plan' => rand(1, 1000),
                'this_year_7_actual' => rand(1, 1000),
                'this_year_8_plan' => rand(1, 1000),
                'this_year_8_actual' => rand(1, 1000),
                'this_year_9_plan' => rand(1, 1000),
                'this_year_9_actual' => rand(1, 1000),
                'this_year_10_plan' => rand(1, 1000),
                'this_year_10_actual' => rand(1, 1000),
                'this_year_11_plan' => rand(1, 1000),
                'this_year_11_actual' => rand(1, 1000),
                'this_year_12_plan' => rand(1, 1000),
                'this_year_12_actual' => rand(1, 1000),
                'nextyear_1_plan' => rand(1, 1000),
                'nextyear_1_actual' => rand(1, 1000),
                'nextyear_2_plan' => rand(1, 1000),
                'nextyear_2_actual' => rand(1, 1000),
                'nextyear_3_plan' => rand(1, 1000),
                'nextyear_3_actual' => rand(1, 1000),
                'del_flg' => 0,
                'created_user' => rand(1, 100),
                'created_datetime' => now(),
                'updated_user' => rand(1, 100),
                'updated_datetime' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
