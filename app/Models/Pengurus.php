<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    use HasFactory;

    // Tabel yang digunakan
    protected $table = 'tb_pengurus';

    // Primary key yang digunakan
    protected $primaryKey = 'id_pengurus';

    // Mengubah field yang timestamps gunakan
    const CREATED_AT = 'waktu_buat';
    const UPDATED_AT = 'waktu_ubah';

    // Menentukan field yang bisa diisi
    protected $fillable = [
        'nama_pembina', 'id_eskul', 'id_ketua', 'id_wakil', 'id_sekretaris', 'id_bendahara'
    ];
}
