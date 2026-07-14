<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kontak', function (Blueprint $table) {
            $table->id('id_kontak');
            $table->string('nama', 100);
            $table->string('email', 150);
            $table->string('no_hp', 20)->nullable();
            $table->string('subjek', 255);
            $table->text('pesan');
            $table->dateTime('tanggal')->useCurrent();
            $table->enum('status', ['belum_dibaca', 'sudah_dibaca', 'dibalas'])->default('belum_dibaca');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kontak');
    }
};
