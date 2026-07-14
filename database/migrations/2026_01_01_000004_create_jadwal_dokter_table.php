<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jadwal_dokter', function (Blueprint $table) {
            $table->id('id_jadwal');
            $table->unsignedBigInteger('id_dokter');
            $table->enum('hari', ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu']);
            $table->time('jam_mulai');
            $table->time('jam_selesai');
            $table->smallInteger('kuota')->unsigned()->default(20);
            $table->tinyInteger('status')->default(1)->comment('1=aktif, 0=libur');

            $table->foreign('id_dokter')
                  ->references('id_dokter')->on('dokter')
                  ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jadwal_dokter');
    }
};
