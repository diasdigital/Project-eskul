<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Pengurus;
use App\Models\Eskul;
use App\Models\Anggota;
use Illuminate\Http\Request;

class PengurusController extends Controller
{
    public function index()
    {
        $dataPengurus = (auth()->user()->id_eskul) 
            ? Pengurus::where('id_eskul', auth()->user()->id_eskul)->get() 
            : Pengurus::all();

        return view('backend.pages.pengurus.index', [
            'tb_pengurus' => $dataPengurus,
            'tb_anggota' => Anggota::all(),
            'tb_eskul' => Eskul::all()
        ]);
    }

    public function edit(Pengurus $pengurus)
    {
        return view('backend.pages.pengurus.edit', [
            'eskul' => Eskul::where('id_eskul', $pengurus->id_eskul)->get()[0],
            'anggota_eskul' => Anggota::where('id_eskul', $pengurus->id_eskul)->get(),
            'pengurus' => $pengurus
        ]);
    }

    public function update(Request $request, Pengurus $pengurus)
    {
        $validatedData = $request->validate([
            'nama_pembina' => 'required|max:255|regex:/^[a-zA-Z\s]*$/',
            'id_ketua' => 'nullable|different:id_wakil|different:id_sekretaris|different:id_bendahara',
            'id_wakil' => 'nullable|different:id_ketua|different:id_sekretaris|different:id_bendahara',
            'id_sekretaris' => 'nullable|different:id_wakil|different:id_ketua|different:id_bendahara',
            'id_bendahara' => 'nullable|different:id_wakil|different:id_sekretaris|different:id_ketua',
        ]);

        Pengurus::where('id_pengurus', $pengurus->id_pengurus)
            ->update($validatedData);

        return redirect('/dashboard/pengurus')->with('berhasil', 'Data pengurus berhasil diubah');
    }
}
