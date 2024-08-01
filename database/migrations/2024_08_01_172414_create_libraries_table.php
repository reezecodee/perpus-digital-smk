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
        Schema::create('libraries', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('nama_perpustakaan');
            $table->string('no_bangunan');
            $table->string('telepon');
            $table->string('email');
            $table->string('operasional_buka');
            $table->string('operasional_tutup');
            $table->string('website');
            $table->string('instagram');
            $table->string('facebook');
            $table->string('twitter_x');
            $table->text('alamat');
            $table->text('logo');
            $table->enum('status', ['Utama', 'Bukan utama'])->default('Bukan utama');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libraries');
    }
};
