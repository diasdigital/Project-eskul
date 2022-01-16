<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use App\Models\Akun;
use App\Models\Anggota;
use App\Models\Eskul;
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
        // Selesai mengisi tabel jurusan


        // Mengisi tabel akun
            Akun::create([
                'nama_petugas' => 'Myoui Mina',
                'username' => 'minari',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'level' => 'Admin'
            ]);
            
            $listPetugas = [
                ['Ahmad Ziriel','superziriel',1],
                ['Zaldy Fardhany','babangzaldy',2],
                ['Muhammad Rizki Pauzi','ubed',3],
                ['Aden Faturahman','denzz',4],
                ['Indi Rahma Putri','dije',5]
            ];
            
            foreach ($listPetugas as $petugas) {
                Akun::create([
                    'nama_petugas' => $petugas[0],
                    'username' => $petugas[1],
                    'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                    'level' => 'Petugas',
                    'id_eskul' => $petugas[2]
                ]);
            }
        // Selesai mengisi tabel akun


        // Mengisi tabel eskul
            $listEskul = [
                ['Basket','basket','basket'],
                ['Sepak Bola','sepak','sepak bola'],
                ['Panah','panah','panah'],
                ['Tenis','tenis','tenis'],
                ['Voli','voli','voli'],
            ];

            foreach ($listEskul as $eskul) {
                Eskul::create([
                    'nama_eskul' => $eskul[0],
                    'foto' => 'foto/eskul/'.$eskul[1].'.png',
                    'deskripsi' => 'Ini eskul '.$eskul[2],
                    'jenis' => 'Wajib'
                ]);
            }
        // Selesai mengisi tabel eskul


        // Mengisi tabel anggota
            $listAnggota = [
                'Adityan Ramadhan',
                'Andhika Putra Haryadi',
                'Arif',
                'Bobi Barlih Brajamusti',
                'Edo Ramdani',
                'Fahad Sarif Ramdan',
                'Fajar Selamat Maulana R.',
                'Isa Kausar Tolu',
                'Ismi Maulida',
                'Jalilah Anandita Nurki',
                'M. Denise Riwansyah Iska',
                'M. Yusuf Maulana',
                'Maulana Yusuf',
                'Muhammad Adriansyah',
                'Muhammad Sufyan Tsarun',
                'Moch. Dyas TM',
                'Nandika Kurniawan',
                'Pebi Pebrian',
                'Rehan Maulidzia Putrra',
                'Rivan Derian',
                'Wildan Faizal N',
                'Rizqy Robiallah',
            ];

            foreach ($listAnggota as $Anggota) {
                Anggota::create([
                    'nis' => mt_rand(100000000,999999999),
                    'nama_anggota' => $Anggota,
                    'tahun_gabung' => mt_rand(2010,2022),
                    'id_jurusan' => mt_rand(1,6),
                    'id_eskul' => mt_rand(1,5)
                ]);
            }            
    }
}
