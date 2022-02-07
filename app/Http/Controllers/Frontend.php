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
}
