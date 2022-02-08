<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Eskul extends Model
{
    use HasFactory;

    // Tabel yang digunakan
    protected $table = 'tb_eskul';

    // Primary key yang digunakan
    protected $primaryKey = 'id_eskul';

    // Mengubah field yang timestamps gunakan
    const CREATED_AT = 'waktu_buat';
    const UPDATED_AT = 'waktu_ubah';

    // Menentukan field yang bisa diisi
    protected $fillable = [
        'nama_eskul', 'slug', 'foto', 'deskripsi', 'jenis'
    ];
}
