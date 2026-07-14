<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriArtikel extends Model
{
    protected $table      = 'kategori_artikel';
    protected $primaryKey = 'id_kategori';
    public    $timestamps = false;

    protected $fillable = ['nama_kategori'];

    // Satu kategori punya banyak artikel
    public function artikel()
    {
        return $this->hasMany(Artikel::class, 'id_kategori', 'id_kategori');
    }
}
