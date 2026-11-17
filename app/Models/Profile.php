<?php

namespace App\Models;

use Sakuci\Database\Model;

class Profile extends Model
{
    protected static ?string $table = 'profiles';

    protected array $fillable = [
        'id_user',
        'nama_lengkap',
        'nis_nisn',
        'kelas',
        'no_telepon',
        'alamat'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id');
    }
}