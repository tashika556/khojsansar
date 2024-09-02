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
                $table->string('authorize');
                $table->string('business');
                $table->string('category');
                $table->string('first_name');
                $table->string('middle_name')->nullable();
                $table->string('last_name');
                $table->unsignedBigInteger('permanent-state');
                $table->unsignedBigInteger('permanent-district');
                $table->unsignedBigInteger('permanent-municipality');
                $table->string('permanent-ward');
                $table->string('permanent-tole');
                $table->unsignedBigInteger('temporary-state')->nullable();
                $table->unsignedBigInteger('temporary-district')->nullable();
                $table->unsignedBigInteger('temporary-municipality')->nullable();
                $table->string('temporary-ward')->nullable();
                $table->string('temporary-tole')->nullable();
                $table->string('email');
                $table->string('phone');
                $table->string('cell')->nullable();
                $table->string('user_name');
                $table->string('password');
                $table->string('cpassword');
                $table->string('otp')->unique()->nullable();
                $table->foreign('permanent-district')->references('id')->on('districts');
                $table->foreign('permanent-state')->references('id')->on('provinces');
                $table->foreign('permanent-municipality')->references('id')->on('municipalities');
                $table->foreign('temporary-district')->references('id')->on('districts');
                $table->foreign('temporary-state')->references('id')->on('provinces');
                $table->foreign('temporary-municipality')->references('id')->on('municipalities');
                $table->boolean('agree')->default(0);
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
