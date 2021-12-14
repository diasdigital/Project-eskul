<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Akun extends Authenticatable
{
    use HasFactory;

    // Tabel yang digunakan
    protected $table = 'tb_akun';

    // Primary key yang digunakan
    protected $primaryKey = 'id_akun';

    // Mengubah field yang timestamps gunakan
    const CREATED_AT = 'waktu_buat';
    const UPDATED_AT = 'waktu_ubah';

    // Menentukan field yang bisa diisi
    protected $fillable = [
        'nama', 'username', 'password', 'level', 'id_eskul'
    ];
}
