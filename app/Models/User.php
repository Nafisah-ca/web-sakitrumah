<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $primaryKey = 'id_user';

    protected $fillable = [
        'nama',
        'email',
        'password',
        'no_hp',
        'role',
        'foto',
        'status',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'password' => 'hashed',
        ];
    }

    // Satu user bisa punya satu data pasien
    public function pasien()
    {
        return $this->hasOne(Pasien::class, 'id_user', 'id_user');
    }
}
