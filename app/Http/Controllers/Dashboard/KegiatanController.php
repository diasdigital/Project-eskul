<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\Eskul;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        $dataKegiatan = (auth()->user()->id_eskul) 
            ? Kegiatan::where('id_eskul', auth()->user()->id_eskul)->get() 
            : Kegiatan::all();

        return view('dashboard.pages.kegiatan.index', [
            'tb_kegiatan' => $dataKegiatan,
            'tb_eskul' => Eskul::all()
        ]); 
    }

    public function create()
    {
        return view('dashboard.pages.kegiatan.create', [
            'tb_eskul' => Eskul::all()
        ]); 
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_kegiatan' => 'required|max:255|regex:/^[a-zA-Z\s]*$/',
            'deskripsi' => 'required',
            'tempat' => 'required',
            'tanggal_pelaksanaan' => 'required|date'
        ]);

        $validatedData['id_eskul'] = (auth()->user()->id_eskul) ??
            $request->validate(['id_eskul' => 'required'])['id_eskul'];

        Kegiatan::create($validatedData);

        return redirect('/dashboard/kegiatan')->with('berhasil', 'Data kegiatan berhasil ditambah!');
    }

    public function edit(Kegiatan $kegiatan)
    {
        return view('dashboard.pages.kegiatan.edit', [
            'kegiatan' => $kegiatan,
            'tb_eskul' => Eskul::all()
        ]);
    }

    public function update(Request $request, Kegiatan $kegiatan)
    {
        $validatedData = $request->validate([
            'nama_kegiatan' => 'required|max:255|regex:/^[a-zA-Z\s]*$/',
            'deskripsi' => 'required',
            'tempat' => 'required',
            'tanggal_pelaksanaan' => 'required|date'
        ]);

        $validatedData['id_eskul'] = (auth()->user()->id_eskul) ??
            $request->validate(['id_eskul' => 'required'])['id_eskul'];

        Kegiatan::where('id_kegiatan', $kegiatan->id_kegiatan)
            ->update($validatedData);

        return redirect('/dashboard/kegiatan')->with('berhasil', 'Data kegiatan berhasil diubah!');
    }

    public function destroy(Kegiatan $kegiatan)
    {
        Kegiatan::destroy($kegiatan->id_kegiatan);

        return redirect('/dashboard/kegiatan')->with('berhasil', "Kegiatan $kegiatan->nama_kegiatan berhasil dihapus");
    }
}
