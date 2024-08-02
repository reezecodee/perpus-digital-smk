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
            $table->uuid('penerima_id');
            $table->uuid('pengirim_id');
            $table->string('judul');
            $table->text('pesan');
            $table->timestamp('tgl_pengiriman');
            $table->timestamps();

            $table->foreign('penerima_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('pengirim_id')->references('id')->on('users')->onDelete('cascade');
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
