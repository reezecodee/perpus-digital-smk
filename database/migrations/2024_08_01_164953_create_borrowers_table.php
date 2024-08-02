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
        Schema::create('borrowers', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('peminjam_id');
            $table->uuid('buku_id');
            $table->uuid('denda_id');
            $table->timestamp('peminjaman');
            $table->timestamp('pengembalian')->nullable();
            $table->date('jatuh_tempo');
            $table->text('keterangan')->nullable();
            $table->timestamps();

            $table->foreign('peminjam_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('buku_id')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('denda_id')->references('id')->on('fines')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrowers');
    }
};
