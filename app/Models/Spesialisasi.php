<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spesialisasi extends Model
{
    protected $table      = 'spesialisasi';
    protected $primaryKey = 'id_spesialisasi';
    public    $timestamps = false;

    protected $fillable = [
        'nama_spesialisasi', 'icon', 'deskripsi',
    ];

    // Satu spesialisasi dimiliki banyak dokter
    public function dokter()
    {
        return $this->hasMany(Dokter::class, 'id_spesialisasi', 'id_spesialisasi');
    }
}
