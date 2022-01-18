<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;

    // Tabel yang digunakan
    protected $table = 'tb_kegiatan';

    // Primary key yang digunakan
    protected $primaryKey = 'id_kegiatan';

    // Mengubah field yang timestamps gunakan
    const CREATED_AT = 'waktu_buat';
    const UPDATED_AT = 'waktu_ubah';

    // Menentukan field yang bisa diisi
    protected $fillable = [
        'nama_kegiatan', 'deskripsi', 'tempat', 'tanggal_pelaksanaan', 'id_eskul'
    ];
}
