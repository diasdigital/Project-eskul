<?php

namespace Database\Seeders;

use App\Models\Jurusan;
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

    }
}
