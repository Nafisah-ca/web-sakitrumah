<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pelayanan extends Model
{
    protected $table      = 'pelayanan';
    protected $primaryKey = 'id_pelayanan';
    public    $timestamps = false;

    protected $fillable = [
        'nama_pelayanan', 'kategori',
        'gambar', 'deskripsi', 'status',
    ];
}
