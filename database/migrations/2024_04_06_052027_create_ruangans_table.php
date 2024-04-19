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
        Schema::create('ruangans', function (Blueprint $table) {
            $table->id();
            $table->string('foto');
            $table->string('nama_ruangan');
            $table->boolean('tipe_ruangan')->default(1);
            $table->string('lokasi');
            $table->integer('maksimal_pegawai');
            $table->string('link_ruangan');
            $table->string('kode_ruangan');
            $table->boolean('status')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ruangans');
    }
};
