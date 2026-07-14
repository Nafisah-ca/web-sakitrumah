<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalDokter extends Model
{
    protected $table      = 'jadwal_dokter';
    protected $primaryKey = 'id_jadwal';
    public    $timestamps = false;

    protected $fillable = [
        'id_dokter', 'hari', 'jam_mulai',
        'jam_selesai', 'kuota', 'status',
    ];

    // Jadwal belongs to satu dokter
    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dokter', 'id_dokter');
    }

    // Satu jadwal bisa punya banyak janji temu
    public function janjiTemu()
    {
        return $this->hasMany(JanjiTemu::class, 'id_jadwal', 'id_jadwal');
    }
}
