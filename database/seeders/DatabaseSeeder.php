<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use App\Models\Akun;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // Mengisi tabel jurusan
        Jurusan::create([
            'nama_jurusan' => 'Akuntansi'
        ]);
        
        Jurusan::create([
            'nama_jurusan' => 'Animasi'
        ]);

        Jurusan::create([
            'nama_jurusan' => 'Otomatisasi Tata Kelola Perkantoran'
        ]);

        Jurusan::create([
            'nama_jurusan' => 'Produksi dan Siaran Program Televisi'
        ]);

        Jurusan::create([
            'nama_jurusan' => 'Rekayasa Perangkat Lunak'
        ]);

        Jurusan::create([
            'nama_jurusan' => 'Teknik Komputer Jaringan'
        ]);

        Akun::create([
            'nama' => 'Myoui Mina',
            'username' => 'minari',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'level' => 'Admin'
        ]);
        
        Akun::create([
            'nama' => 'Ziriel',
            'username' => 'superziriel',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'level' => 'Petugas',
            'id_eskul' => 3
        ]);

    }
}
