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
        Schema::create('loans', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('peminjam_id');
            $table->uuid('buku_id');
            $table->uuid('penempatan_id');
            $table->string('kode_peminjaman')->unique()->nullable();
            $table->date('peminjaman')->nullable();
            $table->date('pengembalian')->nullable();
            $table->text('keterangan')->nullable();
            $table->enum('status', ['Masa pinjam', 'Masa pengembalian', 'Terkena denda', 'Sudah dikembalikan', 'Sudah dibayar', 'Sudah diulas', 'Menunggu persetujuan', 'Ditolak', 'Menunggu diambil', 'E-book', 'E-book sudah diulas'])->default('Menunggu persetujuan');
            $table->enum('keterangan_denda', ['Denda buku rusak', 'Denda buku terlambat', 'Denda buku tidak kembali', 'Tidak ada'])->default('Tidak ada');
            $table->timestamps();

            $table->foreign('peminjam_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('buku_id')->references('id')->on('books')->onDelete('cascade');
            $table->foreign('penempatan_id')->references('id')->on('placements')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
