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
        Schema::create('books', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('kategori_id')->constrained()->onDelete('cascade'); // Foreign key UUID
            $table->string('judul');
            $table->string('kode_buku')->unique();
            $table->string('author');
            $table->string('penerbit');
            $table->string('isbn');
            $table->string('tgl_terbit');
            $table->integer('jml_halaman');
            $table->string('bahasa');
            $table->text('cover_buku');
            $table->text('direktori_ebook')->nullable();
            $table->text('sinopsis');
            $table->enum('format', ['Fisik', 'Elektronik']);
            $table->enum('status', ['Tersedia', 'Tidak tersedia']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
