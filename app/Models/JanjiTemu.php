<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JanjiTemu extends Model
{
    protected $table      = 'janji_temu';
    protected $primaryKey = 'id_janji';
    public    $updatedAt  = null; // hanya created_at

    protected $fillable = [
        'id_pasien', 'id_jadwal', 'tanggal',
        'keluhan', 'nomor_antrian', 'status',
    ];

    protected $casts = [
        'tanggal'    => 'date',
        'created_at' => 'datetime',
    ];

    // Janji temu belongs to satu pasien
    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien', 'id_pasien');
    }

    // Janji temu belongs to satu jadwal dokter
    public function jadwal()
    {
        return $this->belongsTo(JadwalDokter::class, 'id_jadwal', 'id_jadwal');
    }
}
