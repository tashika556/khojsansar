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
    {      Schema::create('reviews', function (Blueprint $table) {
        $table->id();
        $table->unsignedBigInteger('reviewer_id');
        $table->unsignedBigInteger('business_id');
        $table->text('review');
        $table->integer('rating')->default(0);
        $table->timestamps();
        $table->foreign('reviewer_id')->references('id')->on('reviewers')->onDelete('cascade');
        $table->foreign('business_id')->references('id')->on('businesses')->onDelete('cascade');
    });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
