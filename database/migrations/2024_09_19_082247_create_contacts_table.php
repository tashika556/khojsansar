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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('address_one');
            $table->string('address_two')->nullable();
            $table->string('email_one');
            $table->string('email_two')->nullable();
            $table->string('phone_one');
            $table->string('phone_two')->nullable();
            $table->string('facebook_url')->default('https://www.facebook.com/');
            $table->string('twitter_url')->default('https://www.twitter.com/');
            $table->string('instagram_url')->default('https://www.instagram.com/');
            $table->string('youtube_url')->default('https://www.youtube.com/');
            $table->longText('map_url');
            $table->string('opening_hours');
            $table->string('banner');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
