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
        Schema::create('menu_pdfs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('business');
            $table->string('pdf');
            $table->timestamps();
            $table->foreign('business')->references('id')->on('businesses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_pdfs');
    }
};
