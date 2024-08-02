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
            $table->foreignUuid('peminjam_id')->constrained()->onDelete('cascade'); // Foreign key UUID
            $table->foreignUuid('buku_id')->constrained()->onDelete('cascade'); // Foreign key UUID
            $table->foreignUuid('denda_id')->constrained()->onDelete('cascade'); // Foreign key UUID
            $table->enum('status_bayar', ['Belum dibayar', 'Sudah dibayar']);
            $table->enum('alasan_denda', ['Tidak dikembalikan', 'Terlambat', 'Buku rusak', 'Buku hilang']);
            $table->timestamps();
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
