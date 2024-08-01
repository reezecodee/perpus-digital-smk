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
            $table->foreignUuid('peminjam_id')->constrained()->onDelete('cascade'); // Foreign key UUID
            $table->foreignUuid('buku_id')->constrained()->onDelete('cascade'); // Foreign key UUID
            $table->foreignUuid('denda_id')->constrained()->onDelete('cascade'); // Foreign key UUID
            $table->timestamp('peminjaman');
            $table->timestamp('pengembalian')->nullable();
            $table->date('jatuh_tempo');
            $table->text('keterangan')->nullable();
            $table->timestamps();
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
