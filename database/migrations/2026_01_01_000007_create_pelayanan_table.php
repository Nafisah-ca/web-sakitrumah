<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pelayanan', function (Blueprint $table) {
            $table->id('id_pelayanan');
            $table->string('nama_pelayanan', 150);
            $table->string('kategori', 100)->nullable();
            $table->string('gambar', 255)->nullable();
            $table->text('deskripsi')->nullable();
            $table->tinyInteger('status')->default(1)->comment('1=aktif, 0=nonaktif');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pelayanan');
    }
};
