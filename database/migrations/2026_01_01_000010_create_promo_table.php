<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('promo', function (Blueprint $table) {
            $table->id('id_promo');
            $table->unsignedBigInteger('id_rs');
            $table->string('judul', 255);
            $table->text('deskripsi')->nullable();
            $table->string('gambar', 255)->nullable();
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->enum('status', ['aktif', 'tidak_aktif', 'kadaluarsa'])->default('aktif');

            $table->foreign('id_rs')
                  ->references('id_rs')->on('rumah_sakit')
                  ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('promo');
    }
};
