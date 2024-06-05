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
        Schema::table('cart_book', function (Blueprint $table) {
            $table->unsignedBigInteger('cart_id');
            $table->unsignedBigInteger('book_id');

            $table->foreign('cart_id')->references('id')->on('cart')->onDelete('cascade');
            $table->foreign('book_id')->references('id')->on('book')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('cart_book', function (Blueprint $table) {
            Schema::dropIfExists('cart_book');
        });
    }
};
