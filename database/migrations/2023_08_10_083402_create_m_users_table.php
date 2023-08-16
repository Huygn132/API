<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('m_users', function (Blueprint $table) {
            $table->id();
            $table->string('user_name', 100);
            $table->string('password', 100);
            $table->tinyInteger('role')->default(1); // 0: admin, 1: user
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
        Schema::dropIfExists('m_users');
    }
};
