<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promo extends Model
{
    protected $table      = 'promo';
    protected $primaryKey = 'id_promo';
    public    $timestamps = false;

    protected $fillable = [
        'id_rs', 'judul', 'deskripsi', 'gambar',
        'tanggal_mulai', 'tanggal_selesai', 'status',
    ];

    protected $casts = [
        'tanggal_mulai'   => 'date',
        'tanggal_selesai' => 'date',
    ];

    // Promo belongs to satu rumah sakit
    public function rumahSakit()
    {
        return $this->belongsTo(RumahSakit::class, 'id_rs', 'id_rs');
    }
}
