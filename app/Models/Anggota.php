<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    use HasFactory;

    // Tabel yang digunakan
    protected $table = 'tb_anggota';

    // Primary key yang digunakan
    protected $primaryKey = 'id_anggota';

    // Mengubah field yang timestamps gunakan
    const CREATED_AT = 'waktu_buat';
    const UPDATED_AT = 'waktu_ubah';

    // Menentukan field yang bisa diisi
    protected $fillable = [
        'nis', 'nama_anggota', 'id_jurusan', 'tahun_gabung', 'id_eskul'
    ];
}
