<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('artikel', function (Blueprint $table) {
            $table->id('id_artikel');
            $table->unsignedBigInteger('id_kategori');
            $table->string('judul', 255);
            $table->longText('isi');
            $table->string('gambar', 255)->nullable();
            $table->string('penulis', 100)->nullable();
            $table->date('tanggal');
            $table->unsignedInteger('views')->default(0);
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');

            $table->foreign('id_kategori')
                  ->references('id_kategori')->on('kategori_artikel')
                  ->onUpdate('cascade')->onDelete('restrict');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('artikel');
    }
};
