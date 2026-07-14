<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('spesialisasi', function (Blueprint $table) {
            $table->id('id_spesialisasi');
            $table->string('nama_spesialisasi', 150);
            $table->string('icon', 255)->nullable();
            $table->text('deskripsi')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('spesialisasi');
    }
};
