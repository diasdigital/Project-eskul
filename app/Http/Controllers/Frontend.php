<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use App\Models\Eskul;
use App\Models\Kegiatan;
use App\Models\Pengurus;
use App\Models\Prestasi;

class Frontend extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function ekstrakulikuler()
    {
        return view('frontend.ekstrakulikuler', [
            'tb_eskul' => Eskul::all()
        ]);
    }

    public function detailEkstrakulikuler(Eskul $eskul)
    {
        return view('frontend.detail-ekstrakulikuler', [
            'eskul' => $eskul,
            'nama_pembina' => Pengurus::where('id_eskul',$eskul->id_eskul)->first()->nama_pembina,
            'anggota' => Anggota::where('id_eskul',$eskul->id_eskul)->count(),
            'prestasi' => Prestasi::where('id_eskul',$eskul->id_eskul)->count(),
            'tb_kegiatan' => Kegiatan::where('id_eskul', $eskul->id_eskul)->orderBy('tanggal_pelaksanaan', 'asc') ->get()

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

    public function kegiatan()
    {
        return view('frontend.kegiatan', [
            'tb_kegiatan' => Kegiatan::join('tb_eskul', 'tb_kegiatan.id_eskul', '=', 'tb_eskul.id_eskul')
                            ->select('tb_kegiatan.*', 'tb_eskul.slug')
                            ->get()
        ]);
    }
}
