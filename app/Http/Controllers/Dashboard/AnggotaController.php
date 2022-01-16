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
        if (auth()->user()->id_eskul) {
            $dataAnggota = Anggota::where('id_eskul', auth()->user()->id_eskul)->get();
        }else{
            $dataAnggota = Anggota::all();
        }

        return view('dashboard.pages.anggota.index', [
            'tb_anggota' => $dataAnggota,
            'tb_jurusan' => Jurusan::all(),
            'tb_eskul' => Eskul::all()
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

    public function edit(Anggota $anggota)
    {
        return view('dashboard.pages.anggota.edit', [
            'anggota' => $anggota,
            'tb_jurusan' => Jurusan::all(),
            'tb_eskul' => Eskul::all()
        ]);
    }

    public function update(Request $request, Anggota $anggota)
    {
        $validatedData = $request->validate([
            'nis' => 'required|digits:9',
            'nama_anggota' => 'required|max:255|regex:/^[a-zA-Z\s]*$/',
            'tahun_gabung' => 'required|digits:4',
            'id_jurusan' => 'required',
            'id_eskul' => 'required'
        ]);

        Anggota::where('id_anggota', $anggota->id_anggota)
                ->update($validatedData);

        return redirect('/dashboard/anggota')->with('berhasil', "Data anggota $anggota->nama_anggota berhasil diubah");
    }

    public function destroy(Anggota $anggota)
    {
        Anggota::destroy($anggota->id_anggota);

        return redirect('/dashboard/anggota')->with('berhasil', "Anggota $anggota->nama_anggota berhasil dihapus");
    }
}
