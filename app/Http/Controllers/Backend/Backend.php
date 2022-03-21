<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Akun;
use App\Models\Anggota;
use App\Models\Eskul;
use App\Models\Jurusan;
use App\Models\Kegiatan;
use App\Models\Prestasi;
use Illuminate\Http\Request;

class Backend extends Controller
{
    public function index()
    {
        if (auth()->user()->level == 'Admin') {
            return view('backend.index', $this->adminIndex());
        }else {
            return view('backend.index', [
                'judul' => 'anda petugas'
            ]);
        }
    }

    public function adminIndex()
    {
        $tb_eskul = Eskul::all();

        function hitungSemua($tb_eskul, $query)
        {
            $IdEskul = [];
            foreach ($query as $q) {array_push($IdEskul, $q->id_eskul);}

            $hasil = [];
            foreach ($tb_eskul as $eskul) {
                $jumlah = count(array_filter($IdEskul, fn($x) => ($x == $eskul->id_eskul)));
                array_push($hasil, [
                    'nama_eskul' => $eskul->nama_eskul,
                    'jumlah' => $jumlah,
                ]);
            }

            $total = 0;
            foreach ($hasil as $h) {
                $total += $h['jumlah'];
            }
            array_push($hasil, ['total' => $total]);

            return $hasil;
        }

        $data = [
            'statistik_eskul' => [
                'data_anggota' => [
                    'nama_card' => 'Jumlah Anggota',
                    'icon' => 'users',
                    'data_card' => hitungSemua($tb_eskul, Anggota::all())
                ],
                'data_kegiatan' => [
                    'nama_card' => 'Jumlah Kegiatan',
                    'icon' => 'users',
                    'data_card' => hitungSemua($tb_eskul, Kegiatan::all())
                ],
                'data_prestasi' => [
                    'nama_card' => 'Jumlah Prestasi',
                    'icon' => 'users',
                    'data_card' => hitungSemua($tb_eskul, Prestasi::all())
                ]
            ],
            'data_untuk_admin' => [
                'data_petugas' => [
                    'nama_card' => 'Petugas',
                    'icon' => 'user',
                    'data_card' => count(Akun::all())-1
                ],
                'data_jurusan' => [
                    'nama_card' => 'Jurusan',
                    'icon' => 'book-open',
                    'data_card' => count(Jurusan::all())
                ],
                'data_eskul' => [
                    'nama_card' => 'Ekstrakulikuler',
                    'icon' => 'dribbble',
                    'data_card' => count(Eskul::all())
                ]
            ]
        ];

        return $data;
    }

    public function petugasIndex()
    {
        
    }
}