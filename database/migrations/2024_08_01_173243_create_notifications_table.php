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
        Schema::create('notifications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->foreignUuid('penerima_id')->constrained()->onDelete('cascade'); // Foreign key UUID
            $table->foreignUuid('pengirim_id')->constrained()->onDelete('cascade'); // Foreign key UUID
            $table->string('judul');
            $table->text('pesan');
            $table->timestamp('tgl_pengiriman');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifications');
    }
};
