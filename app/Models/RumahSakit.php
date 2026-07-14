<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RumahSakit extends Model
{
    protected $table      = 'rumah_sakit';
    protected $primaryKey = 'id_rs';
    public    $timestamps = false;

    protected $fillable = [
        'nama_rs', 'alamat', 'kota', 'provinsi',
        'telepon', 'email', 'maps', 'jam_operasional',
        'foto', 'deskripsi', 'status',
    ];

    // Satu RS punya banyak dokter
    public function dokter()
    {
        return $this->hasMany(Dokter::class, 'id_rs', 'id_rs');
    }

    // Satu RS punya banyak promo
    public function promo()
    {
        return $this->hasMany(Promo::class, 'id_rs', 'id_rs');
    }
}
