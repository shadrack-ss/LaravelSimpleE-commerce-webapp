<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('surname');
            $table->string('specialty');
            $table->string('skills');
            $table->enum('gender', ['Male', 'Female']);
            $table->date('birth_date');
            $table->string('phone');
            $table->string('email')->unique();
            $table->string('country');
            $table->string('city');
            $table->string('profile_pic')->nullable();
            $table->string('password');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('admins');
    }
};
