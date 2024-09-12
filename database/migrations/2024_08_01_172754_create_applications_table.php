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
        Schema::create('applications', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_sekolah');
            $table->string('nama_perpustakaan');
            $table->string('email');
            $table->string('telepon');
            $table->string('keyword');
            $table->string('website');
            $table->string('jam_buka');
            $table->string('jam_tutup');
            $table->string('hari_libur');
            $table->text('deskripsi');
            $table->text('alamat');
            $table->text('favicon');
            $table->text('logo_sekolah');
            $table->text('logo_perpus');
            $table->text('qris_perpus');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
