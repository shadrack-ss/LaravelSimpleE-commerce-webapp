<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('myusers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('first_name')->nullable();
            $table->string('surname')->nullable();
            $table->string('specialty')->nullable();
            $table->string('skills')->nullable();
            $table->enum('gender', ['Male', 'Female']);
            $table->date('birth_date')->nullable();
            $table->string('phone')->nullable();;
            $table->string('email')->unique();
            $table->string('country')->nullable();
            $table->string('usertype')->default('user');
            $table->string('city')->nullable();
            $table->string('profile_pic')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('myusers');
    }
};
