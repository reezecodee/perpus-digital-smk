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
        Schema::create('articles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('penulis_id')->constrained()->onDelete('cascade'); // Foreign key UUID
            $table->text('thumbnail');
            $table->string('judul');
            $table->string('penulis');
            $table->string('keyword');
            $table->text('deskripsi');
            $table->text('konten_artikel');
            $table->enum('visibilitas', ['Publik', 'Privasi']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('articles');
    }
};
