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
            $table->string('map');
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
