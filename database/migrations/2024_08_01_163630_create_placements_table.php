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
        Schema::create('placements', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('rak_id');
            $table->uuid('buku_id');
            $table->integer('jumlah_buku');
            $table->timestamps();

            $table->foreign('rak_id')->references('id')->on('shelves')->onDelete('cascade');
            $table->foreign('buku_id')->references('id')->on('books')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('placements');
    }
};
