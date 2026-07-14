<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('janji_temu', function (Blueprint $table) {
            $table->id('id_janji');
            $table->unsignedBigInteger('id_pasien');
            $table->unsignedBigInteger('id_jadwal');
            $table->date('tanggal');
            $table->text('keluhan')->nullable();
            $table->smallInteger('nomor_antrian')->unsigned()->nullable();
            $table->enum('status', ['pending', 'dikonfirmasi', 'selesai', 'dibatalkan'])->default('pending');
            $table->timestamp('created_at')->useCurrent();

            $table->foreign('id_pasien')
                  ->references('id_pasien')->on('pasien')
                  ->onUpdate('cascade')->onDelete('restrict');

            $table->foreign('id_jadwal')
                  ->references('id_jadwal')->on('jadwal_dokter')
                  ->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('janji_temu');
    }
};
