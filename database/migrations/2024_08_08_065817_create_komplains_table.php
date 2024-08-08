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
        Schema::create('komplains', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pelapor')->unique();
            $table->string('nama_pelapor');
            $table->string('bidang');
            $table->string('deskripsi');
            $table->string('foto_bukti')->nullable();
            $table->enum('status_transaksi', ['Proses', 'Sedang Proses', 'Selesai'])->default('proses');
            $table->string('typeKomplain');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('komplains');
    }
};
