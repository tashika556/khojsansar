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
        Schema::create('business_facilities', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('facility');
            $table->unsignedBigInteger('business');
            $table->foreign('facility')->references('id')->on('facilities');
            $table->foreign('business')->references('id')->on('businesses');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_facilities');
    }
};
