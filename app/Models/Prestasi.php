<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;

    // Tabel yang digunakan
    protected $table = 'tb_prestasi';

    // Primary key yang digunakan
    protected $primaryKey = 'id_prestasi';

    // Mengubah field yang timestamps gunakan
    const CREATED_AT = 'waktu_buat';
    const UPDATED_AT = 'waktu_ubah';

    // Menentukan field yang bisa diisi
    protected $fillable = [
        'nama_prestasi', 'peringkat', 'tingkat', 'id_eskul', 'bukti_foto', 'tahun_prestasi'
    ];
}
