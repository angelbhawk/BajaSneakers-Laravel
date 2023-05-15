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
        Schema::create('customer_qualifies_product', function (Blueprint $table) {
            $table->id();
            $table->integer('qualification');
            $table->unsignedBigInteger('idproduct');
            $table->unsignedBigInteger('idcustomer');
            $table->foreign('idproduct')->references('id')->on('products')->onDelete('cascade');
            $table->foreign('idcustomer')->references('id')->on('customers')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer_qualifies_product');
    }
};
