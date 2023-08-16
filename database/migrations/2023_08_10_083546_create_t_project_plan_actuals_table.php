<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('t_project_plan_actuals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('project_id');
            $table->foreign('project_id')->references('id')->on('t_projects');
            $table->unsignedBigInteger('staff_id');
            $table->foreign('staff_id')->references('id')->on('m_staff_datas');

            for ($month = 4; $month <= 12; $month++) {
                $table->integer("this_year_{$month}_plan")->nullable();
                $table->integer("this_year_{$month}_actual")->nullable();
            }

            for ($month = 1; $month <= 3; $month++) {
                $table->integer("nextyear_{$month}_plan")->nullable();
                $table->integer("nextyear_{$month}_actual")->nullable();
            }

            $table->boolean('del_flg')->default(0); // 0: active, 1: deleted
            $table->unsignedBigInteger('created_user')->nullable();
            $table->foreign('created_user')->references('id')->on('m_users');
            $table->dateTime('created_datetime')->nullable();
            $table->unsignedBigInteger('updated_user')->nullable();
            $table->foreign('updated_user')->references('id')->on('m_users');
            $table->dateTime('updated_datetime')->nullable();
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('t_project_plan_actuals');
    }
};
