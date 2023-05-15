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
        Schema::create('sizes_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idproduct');
            $table->string('size');
            $table->integer('stock')->default(0);
            $table->foreign('idproduct')->references('id')->on('products')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sizes_products');
    }
};
