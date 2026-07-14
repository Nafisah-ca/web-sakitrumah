<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
    protected $table      = 'pasien';
    protected $primaryKey = 'id_pasien';
    public    $timestamps = false;

    protected $fillable = [
        'id_user', 'nik', 'no_rm', 'tempat_lahir',
        'tanggal_lahir', 'jenis_kelamin', 'alamat',
        'golongan_darah', 'alergi',
    ];

    protected $casts = [
        'tanggal_lahir' => 'date',
    ];

    // Pasien belongs to satu user
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user');
    }

    // Pasien punya banyak janji temu
    public function janjiTemu()
    {
        return $this->hasMany(JanjiTemu::class, 'id_pasien', 'id_pasien');
    }
}
