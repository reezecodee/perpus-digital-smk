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
        Schema::create('fines', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('buku_id'); // Foreign key UUID
            $table->string('denda_terlambat');
            $table->string('denda_rusak');
            $table->string('denda_hilang');
            $table->string('denda_tidak_dikembalikan');
            $table->timestamps();

            $table->foreign('buku_id')->references('id')->on('books')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fines');
    }
};
