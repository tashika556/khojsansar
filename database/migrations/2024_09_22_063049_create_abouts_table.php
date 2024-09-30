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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->longText('details');
            $table->string('cover_image');
            $table->string('mission_image_one');
            $table->string('mission_image_two');
            $table->longText('mission_details');
            $table->string('vision_image_one');
            $table->string('vision_image_two');
            $table->longText('vision_details');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
