<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('rumah_sakit', function (Blueprint $table) {
            $table->id('id_rs');
            $table->string('nama_rs', 150);
            $table->text('alamat');
            $table->string('kota', 100);
            $table->string('provinsi', 100);
            $table->string('telepon', 30)->nullable();
            $table->string('email', 150)->nullable();
            $table->text('maps')->nullable();
            $table->string('jam_operasional', 255)->nullable();
            $table->string('foto', 255)->nullable();
            $table->text('deskripsi')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1=aktif, 0=nonaktif');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rumah_sakit');
    }
};
