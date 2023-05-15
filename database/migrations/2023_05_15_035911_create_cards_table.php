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
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('cardnumber');
            $table->unsignedBigInteger('customerid');
            $table->unsignedBigInteger('addressid');
            $table->string('cardholder');
            $table->date('validity');
            $table->string('code');
            $table->foreign('customerid')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('addressid')->references('id')->on('addresses')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};
