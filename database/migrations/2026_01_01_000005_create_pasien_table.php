<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->id('id_pasien');
            $table->unsignedBigInteger('id_user')->unique();
            $table->char('nik', 16)->nullable()->unique();
            $table->string('no_rm', 20)->nullable()->unique();
            $table->string('tempat_lahir', 100)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->enum('jenis_kelamin', ['L', 'P'])->nullable();
            $table->text('alamat')->nullable();
            $table->enum('golongan_darah', ['A','B','AB','O','A+','A-','B+','B-','AB+','AB-','O+','O-'])->nullable();
            $table->text('alergi')->nullable();

            $table->foreign('id_user')
                  ->references('id_user')->on('users')
                  ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pasien');
    }
};
