<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Eskul;
use App\Models\Kegiatan;
use App\Models\Prestasi;
use Illuminate\Http\Request;

class Backend extends Controller
{
    public function index()
    {
        $tb_eskul = Eskul::all();

        function hitung($tb_eskul, $query)
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

        return view('backend.index', [
            'dashboard' =>[        
                'data_anggota' => ['Jumlah Anggota', 'users', hitung($tb_eskul, Anggota::all())],
                'data_kegiatan' => ['Jumlah Kegiatan', 'calendar', hitung($tb_eskul, Kegiatan::all())],
                'data_prestasi' => ['Jumlah Prestasi', 'star', hitung($tb_eskul, Prestasi::all())],
            ]
        ]);
    }
}
