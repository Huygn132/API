<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('m_staff_datas', function (Blueprint $table) {
            $table->id();
            $table->string('last_name', 200)->nullable();
            $table->string('first_name', 200)->nullable();
            $table->string('last_name_furigana', 200)->nullable();
            $table->string('first_name_furigana', 200)->nullable();
            $table->tinyInteger('staff_type')->nullable(); // 0: staff, 1: partner
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
        Schema::dropIfExists('m_staff_datas');
    }
};
