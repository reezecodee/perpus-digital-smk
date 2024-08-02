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
        Schema::create('fine_payments', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('peminjam_id');
            $table->uuid('buku_id');
            $table->uuid('denda_id');
            $table->enum('status_bayar', ['Belum dibayar', 'Sudah dibayar']);
            $table->enum('alasan_denda', ['Tidak dikembalikan', 'Terlambat', 'Buku rusak', 'Buku hilang']);
            $table->text('bukti_pembayaran')->nullable();
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
        Schema::dropIfExists('fine_payments');
    }
};
