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
                ['Sepak Bola','sepak-bola','sepak'],
                ['Panah','panah','panah'],
                ['Tenis','tenis','tenis'],
                ['Bola Voli','bola-voli','voli'],
            ];

            $deskripsiEskul = [
                '<div>Fusce id tortor eleifend, rhoncus nisl et, porta libero. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin vel purus at massa faucibus faucibus ac at velit. Nam ultrices nibh semper ipsum aliquet maximus. Nam et ipsum non lacus condimentum volutpat vel a augue. Donec posuere nisl in ullamcorper egestas. Quisque venenatis, massa et accumsan sollicitudin, lacus odio vestibulum purus, id egestas metus ipsum semper erat. Etiam et ex sem. Suspendisse sed enim vel urna interdum scelerisque ut eget est. Maecenas et facilisis ipsum, at sollicitudin leo. Integer hendrerit ligula eu purus vehicula sagittis. Curabitur porta, mi non convallis aliquam, quam mauris venenatis odio, sed euismod mi elit a risus. Sed eu lobortis ex. Aliquam vel massa eu libero congue malesuada.</div>

                <div>Fusce pharetra eros non erat consectetur, eget venenatis nunc efficitur. Nunc semper nunc non est varius mollis. Donec sit amet tellus sit amet dolor iaculis interdum. Nullam pretium ipsum in finibus pulvinar. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Curabitur est sapien, condimentum non diam sit amet, interdum ultrices ante. Cras commodo imperdiet ligula consectetur blandit. Pellentesque tincidunt, tellus at eleifend ultricies, magna elit luctus ex, ac dapibus ex leo ac ipsum. Donec dignissim nec ligula eget viverra. Mauris blandit porta sem, id mattis ligula fermentum eget. Phasellus ut enim in mi luctus posuere. Proin feugiat massa id urna pellentesque pulvinar. Phasellus et posuere nunc. Proin varius faucibus nulla a semper. Aliquam elementum sapien quis justo blandit, eget hendrerit ipsum ultricies. Etiam egestas felis lectus, vitae vehicula eros mollis et.</div>
                
                <div>Fusce arcu lacus, efficitur sodales purus ac, pellentesque scelerisque nisi. In nulla leo, eleifend malesuada aliquam ac, lobortis non ligula. Vestibulum varius odio a tempor hendrerit. Vivamus at metus ipsum. Nulla faucibus nibh ipsum, ut pulvinar lorem accumsan eu. Suspendisse tristique lacinia orci, sed auctor lectus efficitur nec. Aliquam volutpat nibh eu sapien iaculis, in dictum est finibus. Phasellus tristique scelerisque semper. Suspendisse potenti. Suspendisse venenatis, nulla sit amet posuere rutrum, quam ex malesuada nibh, sed vestibulum ante arcu eu massa. Vivamus at tristique velit. Nam eget libero fringilla, placerat justo eu, aliquet mi. Curabitur convallis orci at metus sollicitudin, sed tincidunt tortor lobortis. Nullam eget neque commodo, dapibus mi a, efficitur diam.</div>',

                '<div>Aenean aliquet massa ac ligula aliquam, non iaculis purus gravida. Donec at neque ut eros aliquet pulvinar. Donec pharetra et mi ac viverra. Nullam diam quam, venenatis id nisl vel, semper auctor nibh. Etiam quis tempor felis. Suspendisse gravida felis elit, at ultricies diam tincidunt eget. Praesent a dui facilisis, pellentesque erat et, sollicitudin felis. Nam condimentum at felis nec luctus.</div>

                <div>Proin id risus enim. Donec pharetra orci leo, at condimentum sapien dapibus non. Cras sodales magna consectetur magna molestie, ac fermentum metus accumsan. Proin tincidunt ultricies orci eget ultricies. Nunc massa lacus, mollis eget nibh ac, interdum tincidunt urna. Quisque eu egestas purus. Duis aliquet tellus eu nisi facilisis, a tempor risus cursus. Nullam non aliquam risus. Ut facilisis ullamcorper elit in tempus. Morbi mattis erat id velit luctus fringilla a eu nibh. Nulla facilisi. Sed vestibulum velit pellentesque, tempus risus sed, auctor lorem. Duis consequat a dui at accumsan. Sed hendrerit, nulla at auctor scelerisque, magna risus egestas leo, a sodales turpis est at felis. Curabitur in sollicitudin metus.</div>
                
                <div>Sed maximus luctus vehicula. Fusce fermentum luctus tortor, eget efficitur purus efficitur non. Pellentesque et mattis ante. Etiam nisl nisi, consequat ac vulputate at, fringilla sit amet eros. Integer ac purus quis magna laoreet porttitor eget at ex. Nam rhoncus felis vitae leo efficitur, ut dictum mauris condimentum. Sed gravida erat odio, eu faucibus lacus lobortis a. Suspendisse potenti.</div>
                
                <div>Vestibulum ullamcorper molestie dui. Etiam et sem id arcu auctor ultricies. Vivamus dapibus augue id dictum interdum. Praesent mollis imperdiet urna et mattis. Curabitur cursus massa et dapibus bibendum. Suspendisse in est eu diam elementum elementum. Integer ac ullamcorper turpis. Ut a rutrum est. Morbi convallis, mauris eget tincidunt fringilla, neque ipsum imperdiet erat, sit amet ultrices arcu velit a velit. Etiam semper maximus nulla, in tristique magna. Quisque purus ligula, convallis finibus mollis aliquam, molestie sed nulla. Aliquam erat volutpat. Etiam mattis mattis sapien, ac ullamcorper ante interdum ac. Cras eget cursus libero.</div>',

                '<div>Maecenas feugiat enim tortor, in vehicula justo lobortis sed. Vestibulum posuere, magna nec consequat iaculis, libero purus vestibulum est, eget viverra tellus eros sed nibh. Aliquam tempus condimentum justo id mollis. Nullam luctus vel sapien sed feugiat. Maecenas auctor rhoncus cursus. Cras pellentesque maximus lacus, vitae sagittis lacus finibus id. Etiam eros erat, dictum sit amet nisl id, pretium commodo enim. Nunc gravida erat quam, eu faucibus dui lacinia sit amet. Nunc sit amet risus eros. Proin in ornare felis. Donec id facilisis nibh. Ut gravida nisi ipsum, ac scelerisque diam auctor gravida. In maximus nibh eget nisi ultricies, quis tempor orci viverra. Suspendisse mattis nec risus a ullamcorper. Nullam nec sem a libero pellentesque fringilla.</div>

                <div>Vivamus fringilla eleifend nisi, nec blandit orci pharetra vitae. Donec erat est, dictum sit amet mollis quis, volutpat nec sapien. Nunc ante quam, mattis at dignissim maximus, ultricies eget leo. Etiam laoreet turpis arcu, ac venenatis mauris finibus pulvinar. Nulla maximus nisl nibh, at pellentesque urna congue id. In in sapien vel sapien fermentum sodales. Pellentesque commodo, enim ut ornare convallis, elit erat faucibus eros, at porta lectus nisl ac nisl. Ut quis enim vehicula, laoreet est nec, tristique libero. Integer efficitur nunc condimentum, vestibulum urna posuere, aliquet risus. Suspendisse eu nisl id dolor aliquet interdum. Aliquam tempus porta lorem sed condimentum.</div>',

                '<div>Morbi lacinia sollicitudin ex. Donec in neque odio. Morbi a ipsum orci. In nec laoreet dui, at bibendum odio. Quisque eget diam purus. Ut tristique, arcu at porttitor posuere, massa urna tincidunt nunc, et commodo lectus purus et odio. Curabitur bibendum, mauris et aliquam rhoncus, velit ipsum venenatis nisi, non fermentum nisl nunc ut urna. Fusce eu bibendum turpis, a porttitor ex. Donec ultricies leo metus, ut lobortis elit convallis venenatis. Fusce rhoncus posuere consectetur. Donec et justo vel sapien dignissim convallis feugiat id augue.</div>

                <div>Integer viverra porttitor dolor eu cursus. Maecenas fermentum arcu nisi. Aenean pharetra imperdiet dapibus. Vestibulum pretium porta quam, ac gravida massa tempor ac. Fusce consequat, nisl eget iaculis accumsan, dolor lacus semper velit, et auctor enim nulla eget enim. Duis molestie elit eu leo tempor ultricies. Fusce vitae libero at tortor porta viverra. Interdum et malesuada fames ac ante ipsum primis in faucibus. Mauris tempor magna tortor, sed luctus justo euismod quis. Vivamus lacinia vitae ante vel euismod. Nullam lacus massa, cursus non orci quis, interdum ultricies metus. Maecenas vehicula congue facilisis. Vestibulum ullamcorper erat sapien, ac auctor augue bibendum quis. Aliquam elementum tempor mollis. Vivamus ornare nunc non elit convallis, ut vehicula nunc feugiat. Curabitur eu sodales risus.</div>',

                '<div>Praesent facilisis felis at turpis imperdiet, eu pellentesque ligula cursus. Maecenas lacinia cursus nibh nec auctor. Pellentesque eu malesuada justo, sed dapibus elit. Suspendisse lobortis, urna in consectetur fermentum, felis lacus lacinia felis, vehicula facilisis nibh quam nec ligula. In sed iaculis elit, eget posuere purus. Cras sed ante non ex aliquam mollis. Nullam non nisl tortor. Cras ut justo accumsan, cursus lacus eget, ullamcorper metus. Aenean in elit aliquam, accumsan dui ac, facilisis libero. Phasellus posuere ex lobortis vehicula scelerisque. Cras enim orci, placerat at justo rhoncus, lobortis venenatis lectus. Aliquam dui lectus, mattis a sagittis sed, blandit ac neque. Donec ultrices mi et nisi dictum semper. Maecenas lacus justo, egestas a dolor a, sodales commodo risus. Nulla ultrices sit amet elit sed suscipit. Donec in porta ante.</div>

                <div>Suspendisse fringilla quam eget nulla condimentum malesuada. Nam ligula velit, vulputate nec turpis ut, suscipit eleifend lectus. Nulla justo augue, ultrices quis interdum sit amet, ultricies eu nunc. Mauris non risus non est porttitor ornare. Fusce suscipit aliquam auctor. Nulla posuere sed nibh ut bibendum. Aliquam feugiat nulla ac gravida cursus. Nam placerat posuere viverra.</div>'
            ];
            $i = 0;

            foreach ($listEskul as $eskul) {
                Eskul::create([
                    'nama_eskul' => $eskul[0],
                    'slug' => $eskul[1],
                    'foto' => 'foto/eskul/'.$eskul[2].'.png',
                    'deskripsi' => $deskripsiEskul[$i],
                    'jenis' => 'Wajib'
                ]);
                $i++;
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
        
            for ($i=0; $i < 150; $i++) {
                $id_eskul =  mt_rand(1,5);
                $fotoEskul = ['basket', 'sepak', 'panah', 'tenis', 'voli'];
                Prestasi::create([
                    'nama_prestasi' => $prestasi[mt_rand(0,(count($prestasi)-1))],
                    'peringkat' => $peringkat[mt_rand(0,(count($peringkat)-1))],
                    'tingkat' => $tingkat[mt_rand(0,(count($tingkat)-1))],
                    'tahun_prestasi' => mt_rand(2010,2022),
                    'bukti_foto' => 'foto/prestasi/prestasi-'. mt_rand(1,16) .'.jpg',
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
                $tahun = mt_rand(2021,date('Y'));
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
            $listPembina = ['Weli','Samirah','Inzhagi','Rahayu','Ihsan'];
            for ($i=0; $i < count($listEskul); $i++) {
                Pengurus::create([
                    'id_eskul' => $i+1,
                    'nama_pembina' => $listPembina[$i]
                ]);
            }
                      
    }
}
