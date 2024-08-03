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
        Schema::create('liked_books', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('buku_id');
            $table->uuid('peminjam_id');
            $table->timestamps();

            $table->foreign('buku_id')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('peminjam_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('liked_books');
    }
};
