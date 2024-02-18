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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name',40);
            $table->string('img',100);
            $table->longText('description')->nullable();
            $table->unsignedbigInteger('categories_id');
            $table->foreign('categories_id')->references('id')->on('categories');
            $table->unsignedbigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('statuses');
            $table->bigInteger('price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
