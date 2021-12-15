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
        $listJurusan = [
            'Akuntansi',
            'Animasi',
            'Otomatisasi Tata Kelola Perkantoran',
            'Produksi dan Siaran Program Televisi',
            'Rekayasa Perangkat Lunak',
            'Teknik Komputer Jaringan'
        ];

        foreach ($listJurusan as $jurusan) {
            Jurusan::create([
                'nama_jurusan' => $jurusan
            ]);
        }

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
            'id_eskul' => 1
        ]);
        
        Akun::create([
            'nama' => 'Zaldy',
            'username' => 'babangzaldy',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'level' => 'Petugas',
            'id_eskul' => 2
        ]);
        
        Akun::create([
            'nama' => 'Rizki',
            'username' => 'ubed',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'level' => 'Petugas',
            'id_eskul' => 3
        ]);

    }
}
