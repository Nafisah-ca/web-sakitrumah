<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artikel extends Model
{
    protected $table      = 'artikel';
    protected $primaryKey = 'id_artikel';
    public    $timestamps = false;

    protected $fillable = [
        'id_kategori', 'judul', 'isi', 'gambar',
        'penulis', 'tanggal', 'views', 'status',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];

    // Artikel belongs to satu kategori
    public function kategori()
    {
        return $this->belongsTo(KategoriArtikel::class, 'id_kategori', 'id_kategori');
    }
}
