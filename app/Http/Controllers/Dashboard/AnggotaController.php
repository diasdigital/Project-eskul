<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Jurusan;
use App\Models\Eskul;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.anggota.index', [
            'tb_anggota' => Anggota::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.pages.anggota.create', [
            'tb_jurusan' => Jurusan::all(),
            'tb_eskul' => Eskul::all(),
            'tahun_ini' => now()
        ]);
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Anggota $anggota)
    {
        //
    }

    public function edit(Anggota $anggota)
    {
        //
    }

    public function update(Request $request, Anggota $anggota)
    {
        //
    }

    public function destroy(Anggota $anggota)
    {
        //
    }
}
