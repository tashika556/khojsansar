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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('business');
            $table->string('payment_receipt');
            $table->boolean('payment_confirmation')->default(false);;
            $table->boolean('admin_payment_confirmation')->default(false);
            $table->foreign('business')->references('id')->on('businesses')->onDelete('CASCADE')->onUpdate('CASCADE');;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
