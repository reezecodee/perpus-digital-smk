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
            $table->uuid('kategori_id');
            $table->string('judul');
            $table->string('author');
            $table->string('penerbit');
            $table->string('isbn');
            $table->string('tgl_terbit');
            $table->integer('jml_halaman');
            $table->string('bahasa');
            $table->text('cover_buku');
            $table->text('e_book_file')->nullable();
            $table->text('sinopsis');
            $table->enum('format', ['Fisik', 'Elektronik']);
            $table->enum('status', ['Tersedia', 'Tidak tersedia']);
            $table->timestamps();

            $table->foreign('kategori_id')->references('id')->on('categories')->onDelete('cascade');
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
