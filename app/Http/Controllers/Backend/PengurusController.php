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
            'ketua' => 'nullable|different:wakil|different:sekretaris|different:bendahara',
            'wakil' => 'nullable|different:ketua|different:sekretaris|different:bendahara',
            'sekretaris' => 'nullable|different:wakil|different:ketua|different:bendahara',
            'bendahara' => 'nullable|different:wakil|different:sekretaris|different:ketua',
        ]);

        $array = ['ketua','wakil','sekretaris','bendahara'];

        for ($i=0; $i < 4; $i++) { 
            $validatedData['id_'.$array[$i]] = $validatedData[$array[$i]];
            unset($validatedData[$array[$i]]);
        }

        Pengurus::where('id_pengurus', $pengurus->id_pengurus)
            ->update($validatedData);

        return redirect('/dashboard/pengurus')->with('berhasil', 'Data pengurus berhasil diubah');
    }
}
