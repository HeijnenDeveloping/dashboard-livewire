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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            //first name
            $table->string('fname')->nullable();
            //last name
            $table->string('lname')->nullable();
            //phone number
            $table->string('phone')->nullable();
            //address
            $table->string('address')->nullable();
            //city
            $table->string('city')->nullable();
            //state
            $table->string('state')->nullable();
            //zip
            $table->string('zip')->nullable();
            //country
            $table->string('country')->nullable();
            //date of birth
            $table->date('birthday')->nullable();
            //clock in
            $table->time('clock_in')->nullable();
            //clock out
            $table->time('clock_out')->nullable();
            //clock in date
            $table->date('clock_in_date')->nullable();
            //clock out date
            $table->date('clock_out_date')->nullable();
            //clock in location enum home and office
            $table->enum('clock_in_location', ['home', 'office'])->nullable();
            //clock out location enum home and office
            $table->enum('clock_out_location', ['home', 'office'])->nullable();

            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->foreignId('current_team_id')->nullable();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
            //soft delete
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
