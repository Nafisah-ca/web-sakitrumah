<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
    protected $table      = 'dokter';
    protected $primaryKey = 'id_dokter';
    public    $timestamps = false;

    protected $fillable = [
        'id_rs', 'id_spesialisasi', 'nama', 'gelar',
        'jenis_kelamin', 'foto', 'pendidikan',
        'pengalaman', 'biografi', 'no_str', 'status',
    ];

    // Dokter belongs to satu rumah sakit
    public function rumahSakit()
    {
        return $this->belongsTo(RumahSakit::class, 'id_rs', 'id_rs');
    }

    // Dokter belongs to satu spesialisasi
    public function spesialisasi()
    {
        return $this->belongsTo(Spesialisasi::class, 'id_spesialisasi', 'id_spesialisasi');
    }

    // Dokter punya banyak jadwal
    public function jadwal()
    {
        return $this->hasMany(JadwalDokter::class, 'id_dokter', 'id_dokter');
    }
}
