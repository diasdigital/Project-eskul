<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Jurusan;
use App\Models\Eskul;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        $dataAnggota = (auth()->user()->id_eskul) 
            ? Anggota::where('id_eskul', auth()->user()->id_eskul)->get() 
            : Anggota::all();

        return view('backend.pages.anggota.index', [
            'tb_anggota' => $dataAnggota,
            'tb_jurusan' => Jurusan::all(),
            'tb_eskul' => Eskul::all()
        ]);
    }

    public function create()
    {
        return view('backend.pages.anggota.create', [
            'tb_jurusan' => Jurusan::all(),
            'tb_eskul' => Eskul::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nis' => 'required|digits:9|unique:tb_anggota,nis',
            'nama_anggota' => 'required|max:255|regex:/^[a-zA-Z\s]*$/',
            'tahun_gabung' => 'required|digits:4',
            'jurusan' => 'required'
        ]);

        $validatedData['id_jurusan'] = $validatedData['jurusan'];
        unset($validatedData['jurusan']);

        $validatedData['id_eskul'] = (auth()->user()->id_eskul) ??
            $request->validate(['eskul' => 'required'])['eskul'];

        Anggota::create($validatedData);

        return redirect('/dashboard/anggota')->with('berhasil', 'Data anggota berhasil ditambah');
    }

    public function edit(Anggota $anggota)
    {
        return view('backend.pages.anggota.edit', [
            'anggota' => $anggota,
            'tb_jurusan' => Jurusan::all(),
            'tb_eskul' => Eskul::all()
        ]);
    }

    public function update(Request $request, Anggota $anggota)
    {
        $rules = [
            'nama_anggota' => 'required|max:255|regex:/^[a-zA-Z\s]*$/',
            'tahun_gabung' => 'required|digits:4',
            'jurusan' => 'required'
        ];

        if ($request->nis != $anggota->nis) {
            $rules['nis'] = 'required|digits:9|unique:tb_anggota,nis';
        }

        $validatedData = $request->validate($rules);

        $validatedData['id_jurusan'] = $validatedData['jurusan'];
        unset($validatedData['jurusan']);

        $validatedData['id_eskul'] = (auth()->user()->id_eskul) ??
            $request->validate(['eskul' => 'required'])['eskul'];

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
