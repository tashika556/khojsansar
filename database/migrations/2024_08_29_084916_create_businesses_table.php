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
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer');
            $table->longText('summary');
            $table->string('address');
            $table->unsignedBigInteger('state');
            $table->unsignedBigInteger('district');
            $table->unsignedBigInteger('municipality');
            $table->string('ward');
            $table->string('tole');
            $table->string('latitude');
            $table->string('longitude');
            $table->string('website_url');
            $table->string('phone_one');
            $table->string('phone_two');
            $table->string('email_one');
            $table->string('email_two');
            $table->string('logo');
            $table->string('coverimage');
            $table->foreign('customer')->references('id')->on('customers');
            $table->foreign('state')->references('id')->on('provinces');
            $table->foreign('district')->references('id')->on('districts');
            $table->foreign('municipality')->references('id')->on('municipalities');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('businesses');
    }
};
