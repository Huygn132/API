<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('t_projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_name', 100)->nullable();
            $table->string('order_number', 100)->nullable();
            $table->string('client_name', 100)->nullable();
            $table->dateTime('order_date')->nullable();
            $table->tinyInteger('status')->nullable(); // 0: active, 1: inactive, etc.
            $table->integer('order_income')->nullable();
            $table->integer('internal_unit_price')->nullable();
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
        Schema::dropIfExists('t_projects');
    }
};
