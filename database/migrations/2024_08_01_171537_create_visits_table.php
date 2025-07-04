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
        Schema::create('visits', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('pengunjung_id');
            $table->string('tanggal_kunjungan');
            $table->text('keterangan_kunjungan');
            $table->enum('status_kunjungan', ["Menunggu persetujuan", "Diterima", "Ditolak"])->default('Menunggu persetujuan');
            $table->timestamps();

            $table->foreign('pengunjung_id')->references('id')->on('users')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visits');
    }
};
