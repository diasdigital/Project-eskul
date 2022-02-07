<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use App\Models\Eskul;
use App\Models\Prestasi;

class Frontend extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function tentang()
    {
        return view('frontend.tentang', [
            'tb_eskul' => Eskul::count(),
            'tb_anggota' => Anggota::count(),
            'tb_prestasi' => Prestasi::count()
        ]);
    }

    public function ekstrakulikuler()
    {
        return view('frontend.ekstrakulikuler', [
            'tb_eskul' => Eskul::all()
        ]);
    }

    public function prestasi()
    {
        $prestasi = Prestasi::join('tb_eskul', 'tb_prestasi.id_eskul', '=', 'tb_eskul.id_eskul')
                        ->select('tb_prestasi.*', 'tb_eskul.nama_eskul')
                        ->get();

        $filterEskul = [];
        foreach (Eskul::all() as $eskul) {
            array_push($filterEskul, [strtok(strtolower($eskul->nama_eskul), " "), $eskul->nama_eskul]);
        }

        return view('frontend.prestasi', [
            'data_eskul' => $filterEskul,
            'tb_prestasi' => $prestasi
        ]);
    }

    public function detailPrestasi(Prestasi $prestasi)
    {
        return view('frontend.detail-prestasi', [
            'tb_eskul' => Eskul::all(),
            'prestasi' => $prestasi
        ]);
    }
}
