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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->integer('id_pegawai');
            $table->integer('id_ruangan');
            $table->time('waktu_pinjam');
            $table->time('waktu_selesai');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_selesai');
            $table->string('agenda');
            $table->string('judul');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
