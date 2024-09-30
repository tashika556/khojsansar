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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('authorize');
            $table->string('business');
            $table->unsignedBigInteger('category');
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->unsignedBigInteger('permanent_state');
            $table->unsignedBigInteger('permanent_district');
            $table->unsignedBigInteger('permanent_municipality');
            $table->string('permanent_ward');
            $table->string('permanent_tole');
            $table->string('permanent_city');
            $table->unsignedBigInteger('temporary_state')->nullable();
            $table->unsignedBigInteger('temporary_district')->nullable();
            $table->unsignedBigInteger('temporary_municipality')->nullable();
            $table->string('temporary_ward')->nullable();
            $table->string('temporary_tole')->nullable();
            $table->string('temporary_city')->nullable();
            $table->string('address');
            $table->string('email');
            $table->string('phone');
            $table->string('cell')->nullable();
            $table->string('user_name');
            $table->string('password');
            $table->string('cpassword');
            $table->string('otp')->unique()->nullable();
            $table->boolean('admin_verified')->default(false);
            $table->boolean('admin_rejected')->default(false);
            $table->boolean('agree');
            $table->longText('rejection_reason');
            $table->foreign('permanent_district')->references('id')->on('districts');
            $table->foreign('permanent_state')->references('id')->on('provinces');
            $table->foreign('permanent_municipality')->references('id')->on('municipalities');
            $table->foreign('temporary_district')->references('id')->on('districts');
            $table->foreign('temporary_state')->references('id')->on('provinces');
            $table->foreign('temporary_municipality')->references('id')->on('municipalities');
            $table->foreign('authorize')->references('id')->on('authorizes');
            $table->foreign('category')->references('id')->on('categories');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
