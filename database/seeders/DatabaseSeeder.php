<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use App\Models\Akun;
use App\Models\Anggota;
use App\Models\Eskul;
use App\Models\Kegiatan;
use App\Models\Pengurus;
use App\Models\Prestasi;
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

            foreach ($listAnggota as $anggota) {
                Anggota::create([
                    'nis' => mt_rand(100000000,999999999),
                    'nama_anggota' => $anggota,
                    'tahun_gabung' => mt_rand(2010,2022),
                    'id_jurusan' => mt_rand(1,6),
                    'id_eskul' => mt_rand(1,5)
                ]);
            }
        // Selesai mengisi tabel anggota
        
        
        // Mengisi tabel prestasi
            $prestasi = [
                'Olimpiade besar',
                'Perlombaan besar',
                'Pertandingan besar',
                'Kompetisi besar',
                'Olimpiade sedang',
                'Perlombaan sedang',
                'Pertandingan sedang',
                'Kompetisi sedang',
                'Olimpiade kecil',
                'Perlombaan kecil',
                'Pertandingan kecil',
                'Kompetisi kecil'
            ];
            $peringkat = ['pertama','kedua','ketiga','harapan satu','harapan dua','harapan tiga', 'favorit'];
            $tingkat = ['Desa', 'Kota', 'Kabupaten', 'Provinsi', 'Negara', 'Benua', 'Internasional'];
        
            for ($i=0; $i < 50; $i++) {
                $id_eskul =  mt_rand(1,5);
                $fotoEskul = ['basket', 'sepak', 'panah', 'tenis', 'voli'];
                Prestasi::create([
                    'nama_prestasi' => $prestasi[mt_rand(0,(count($prestasi)-1))],
                    'peringkat' => $peringkat[mt_rand(0,(count($peringkat)-1))],
                    'tingkat' => $tingkat[mt_rand(0,(count($tingkat)-1))],
                    'tahun_prestasi' => mt_rand(2010,2022),
                    'bukti_foto' => 'foto/prestasi/'.$fotoEskul[($id_eskul-1)].'.png',
                    'id_eskul' => $id_eskul
                ]);
            }
        // Selesai mengisi tabel prestasi


        // Mengisi tabel kegiatan
            $kegiatan = [
                'Latihan pagi',
                'Latihan siang',
                'Latihan sore',
                'Latihan malam',
                'Persiapan lomba',
                'Rapat',
                'Pembagian tugas',
                'Pengumuman penting',
                'Diskusi',
                'Rekreasi',
            ];

            $tempat = [
                'Lapang Merdeka',
                'Lapang Suryakencana',
                'GOR Pasim',
                'Gedung SMK Pasim',
                'GOR Lapdek',
                'Lapang Secapa',
                'Selabintana',
            ];

            function generateTanggal()
            {
                $tahun = mt_rand(2010,date('Y'));
                $bulan = mt_rand(1,12);
                if (in_array($bulan, [1,3,5,7,8,10,12])) {
                    $hari = mt_rand(1,31);
                }elseif ($bulan == 2) {
                    $hari = mt_rand(1,28);
                }else{
                    $hari = mt_rand(1,30);
                }

                $tanggal = $tahun.'-'.$bulan.'-'.$hari;
                return $tanggal;
            }

            for ($i=0; $i < 50; $i++) {
                $tanggal = generateTanggal();

                Kegiatan::create([
                    'nama_kegiatan' => $kegiatan[mt_rand(0,(count($kegiatan)-1))],
                    'deskripsi' => 'Ini merupakan bagian dari deskripsi untuk kegiatan '.$kegiatan[mt_rand(0,(count($kegiatan)-1))],
                    'tempat' => $tempat[mt_rand(0,(count($tempat)-1))],
                    'tanggal_pelaksanaan' => $tanggal,
                    'id_eskul' => mt_rand(1,5)
                ]);
            }
        // Selesai mengisi tabel kegiatan


        // Mengisi tabel pengurus
        // ini berhubungan erat dengan tabel eskul
            for ($i=0; $i < count($listEskul); $i++) {
                Pengurus::create([
                    'id_eskul' => $i+1
                ]);
            }
                      
    }
}
