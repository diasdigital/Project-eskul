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
                'Alisca Naura Suhendar','Anisya Sasprilia','Annisa Banawati S','Asri Yulianti Putri','Astri Sulastri','Bimo Briliant','Bilkis Pitriyani','Candra','Chika Salma Oktawati','Desti Amelia Putri','Destia Amelia','Elfa Thesty Purnamasari','Intan Carlyan','Luthfia Denaya Athiullah','M Padli Mulyana','Marliana Nurzalilah','Marvel Johansyah','Meisya Indri','Munaroh Sri Diyanti','Nabila Anindya','Nasywaa Kamalia','Nensa Ainur Fitri','Qalby Levi Leon','Rahma Noor Aeny','Revi Septiani Supriyadi','Reza M Rizki','Rizki Maulan Apandi','Rizky Saputra','Salma Hidari Fatinah I','Salsyabila Putri Januari','Salwa Marliana','Sintia Putri Rahayu','Siti Zahwa Ainun Nissa','Sri Ayu Adelia','Tia Aristia','Tiara Anandita','Zahra Aprili Fasha',
                'Abdullah Arfa Rizki','Afdilla Aulia','Amir Ramdani','Daffa Atalah Ramadhan','Esanda Fatimah A','Farhan Ramadhan Haryadi','Gerisal Syahbaninawa','Iman Rizky Fadillah','M. Ridwan Haikal R','M. Falwa Direngga','Muhammad Nazrudin Septiaji','Muhamad Rafly Maulida','Nurlistia Ningrat','Raihan Karimatullail','Salma Sri Anugrah','Sifa Rizqa','Siti Rahmah Apriliani','Sri Rahayu Sukmawan','Syarla Nabila',

                'Ade Sri Ranjani','Adelia Wahyu Fitriani','Alda Nur Pasha Raina','Al-Salwa Audira F','Alya Putri Haryadianti','Amanda Basalwa','Arke Arnetha Nugraha','Az-Zahra Salsabila','Cindy Aulia','Clarisa Putri','Kanjeng Dewi Cahyani','Laisya Putri Fazia','Lavialova Salsa Nabilah','Muhamad Akmal Febrian','Muhammad Raihan A','Putri','Ratu Nurul Intan','Riani Sawitri','Rina Nurfarida','Salma Hari Nabilah','Salwa Sulistia R.','Sendi Subagja','Sherly Marselinda','Siti Nur Aisyah','Siti Nuraeni','Sonia Nuraeni','Trifani Nurlufi Hana','Vanessa Paradise','Zahra Aulya Mardani',

                'Adelia Puspita Sari','Aliya Yossabira Putri','Amanda Tressia','Ariel Ahmad Ashfahany','Ayi Nadia','Berliana Febrianti','Berliana Oktavia','Cindi Wulandari','Deby Dwi Adriani','Firda Putri Handayani','Irfandya Rafnasya P','Juwita Anggraeni','Juliana Payuk Tandian','M. Rifky Ramadhan','Mariska Agustiani','Morli Oktavianti','Muhamad Dafa Rizqillah','Nurkhaesa Putri M','Rahma Nurhaliza','Regita Nurseptiani','Rifqi Dotulong','Risha Nurlita Supiyani','Salmarona Ligar Putriwan','Septia Aulia','Silfi Aprilianti','Tarissya Nur Octaviana','Tasya Ainun Nisa','Yunias Eleanor T','Fajar Dwi R','Nurhayati',

                'Alfand Firly Budiman','Alfina Solati','Aufa Rafiqi Yunus','Azmi Zaenal Putra','Dewangga Ramadhanu ','Dina Aulia','Haidar Aly Basyir','Keysha Kevin Ramadhan','Lutfan Abdul Manaf','M. Chairil Arsy','M. Fakhrul Wafi Al-Hikam','M. Shaifan','Muhammad Dhika B. P','Nailan Hasanah','Putri Nova Permata','Rama Robiansyah','Ririn Nur Rindah','Restu Cahya Apendi','Saepul Hidayat','Saldi Salasa Putra','Siti Fatimah','Syawalia Rahmah Mawarni','Thryas Nico A','Zahran N. A','Rendy Renaldi','Tegar Cipta',

                'Ajeng Sadi Puja','Alif Aulia','Aprilia Fauzia','Aulia Putri','Bayu Saputra','Dani Aditia Saputra','Dheta Febriany','Firhat Hasan','Gandari Kalang Kawitan','Haikal Nazmi Hasan','Haura Putri Suhendar','M. Agung Nurhafis','M. Fahmi','Muhammad Rangga','Marsya Sahida','Nabila Maharani Ajahra','Natasya Salsabilla','Pranata Putra Defian','Raimanita Shiva Junisa','Ratu Salwa Thufailla','Ridwan Purnama','Rizal Riansyah Saginar','Salma Khansa Callysta','Silfanya Alda Aprilia','Syahrul Ramadhan','Taufan Pamungkas','Windi Saputra','Wafda Firdaus S','Dimas Ziad F',

                'Adityan Ramadhan','Andhika Putra Haryadi','Arif','Bobi Barlih Brajamusti','Edo Ramdani','Fahad Sarif Ramdan','Fajar Selamat Maulana R.','Isa Kausar Tolu','Ismi Maulida','Jalilah Anandita Nurki','M. Denise Riwansyah Iska','M. Yusuf Maulana','Maulana Yusuf','Muhammad Adriansyah','Muhammad Sufyan Tsarun','Moch. Dyas TM','Nandika Kurniawan','Pebi Pebrian','Rehan Maulidzia Putrra','Rivan Derian','Wildan Faizal N','Rizqy Robiallah',

                'Abdullah Pauzan','Agung Bahtiar','Aliph Rochmat','Ananda Puji H.','Arphan Maulana Firdaus','Arya Ababil','Arya Ahmudika','Arya Dwi Putra','Diva Saputra Ahmad Setiawan','Fajar Goldi','Fathir Najandra Yusuf','Irfan Maulana','Laksmana Ilham Syah','Leofery Agisna Putra Perdana','M. Rizky Kurniawan','M. Adi Suryanto','M. Ahyar Fauzi','Muhammad. Dhimas Rhifaldhi','M. Faqih Fadli','M. Hizran Pratama','Mochamad Raihan Putra Anugerah','M. Reja Maulana','Moch Azkiya Syawaludin','Mochamad Fikri Fadilah','Mochamad Rifal Andriansyah','Muhamad Gifar Maulana','Muhamad Rizki Fadilah','Muhammad Ihsan','Muhammad Rayya Al Ghifari','Muhammad Yendi','Nanda','Nathanael Lesmana','Raffi Adiansyah','Rendi Suharyadi','Rifaldi Maulana','Rio Adrian Pamungkas','Sultan Muhamad Tsany','Rafli Muharram'
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
        
            for ($i=0; $i < 200; $i++) {
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

            for ($i=0; $i < 200; $i++) {
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
