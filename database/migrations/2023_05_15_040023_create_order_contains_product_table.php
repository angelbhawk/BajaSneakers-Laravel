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
        Schema::create('order_contains_product', function (Blueprint $table) {
            $table->id();
            $table->integer('quantity');
            $table->unsignedBigInteger('idorder');
            $table->unsignedBigInteger('idproduct');
            $table->unsignedBigInteger('idsize');
            $table->foreign('idorder')->references('id')->on('orders')->onDelete('cascade');
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
        Schema::dropIfExists('order_contains_product');
    }
};
