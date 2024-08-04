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
        Schema::create('pemeliharaans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barang_id')->nullable();
            $table->date('tgl_perbaikan');
            $table->time('jam_perbaikan')->nullable();
            $table->unsignedBigInteger('lokasi_id')->nullable();
            $table->string('deskripsi');
            $table->unsignedBigInteger('pegawai_id')->nullable();
            $table->enum('status', ['Clodsed', 'Waiting']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemeliharaans');
    }
};
