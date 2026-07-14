<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('dokter', function (Blueprint $table) {
            $table->id('id_dokter');
            $table->unsignedBigInteger('id_rs');
            $table->unsignedBigInteger('id_spesialisasi');
            $table->string('nama', 150);
            $table->string('gelar', 100)->nullable();
            $table->enum('jenis_kelamin', ['L', 'P']);
            $table->string('foto', 255)->nullable();
            $table->text('pendidikan')->nullable();
            $table->text('pengalaman')->nullable();
            $table->text('biografi')->nullable();
            $table->string('no_str', 50)->nullable()->unique();
            $table->tinyInteger('status')->default(1)->comment('1=aktif, 0=nonaktif');

            $table->foreign('id_rs')
                  ->references('id_rs')->on('rumah_sakit')
                  ->onUpdate('cascade')->onDelete('restrict');

            $table->foreign('id_spesialisasi')
                  ->references('id_spesialisasi')->on('spesialisasi')
                  ->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('dokter');
    }
};
