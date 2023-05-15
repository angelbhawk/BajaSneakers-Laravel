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
        Schema::create('cart_contains_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idproduct');
            $table->integer('quantity');
            $table->unsignedBigInteger('idsize');
            $table->foreign('idproduct')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('idsize')->references('id')->on('sizes_products')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_contains_products');
    }
};
