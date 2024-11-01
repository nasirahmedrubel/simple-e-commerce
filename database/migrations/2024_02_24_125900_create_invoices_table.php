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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('name', 40);
            $table->string('phone', 11);
            $table->string('address', 200);
            $table->string('remarkable', 200)->nullable();
            $table->unsignedSmallInteger('Dcharge');
            $table->integer('bill');
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('status_orders');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
