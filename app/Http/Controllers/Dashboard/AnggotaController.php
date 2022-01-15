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
        $validatedData = $request->validate([
            'nis' => 'required|digits:9',
            'nama_anggota' => 'required|max:255|regex:/^[a-zA-Z\s]*$/',
            'tahun_gabung' => 'required|digits:4',
            'id_jurusan' => 'required',
            'id_eskul' => 'required'
        ]);

        Anggota::create($validatedData);

        return redirect('/dashboard/anggota')->with('berhasil', 'Data anggota berhasil ditambah!');
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
