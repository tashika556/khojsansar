<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('business_menus', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_topic');
            $table->unsignedBigInteger('business');
            $table->string('title');
            $table->string('price');
            $table->longText('caption');
            $table->string('photo')->nullable();
            $table->foreign('menu_topic')->references('id')->on('menus');
            $table->foreign('business')->references('id')->on('businesses');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('business_menus');
    }
};
