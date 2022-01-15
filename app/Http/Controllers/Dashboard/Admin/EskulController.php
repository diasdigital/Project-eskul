<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Eskul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class EskulController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.eskul.index', [
            'tb_eskul' => Eskul::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.pages.eskul.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_eskul' => 'required|max:255',
            'foto' => 'image|file|max:1024',
            'jenis' => 'required',
            'deskripsi' => 'required'
        ]);

        if($request->file('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('foto/eskul');
        }

        Eskul::create($validatedData);

        return redirect('/dashboard/eskul')->with('berhasil', 'Data eskul berhasil ditambah!');
    }

    public function show(Eskul $eskul)
    {        
        //
    }

    public function edit(Eskul $eskul)
    {
        return view('dashboard.pages.eskul.edit', [
            'eskul' => $eskul
        ]);
    }

    public function update(Request $request, Eskul $eskul)
    {
        $validatedData = $request->validate([
            'nama_eskul' => 'required|max:255',
            'foto' => 'image|file|max:1024',
            'jenis' => 'required',
            'deskripsi' => 'required'
        ]);

        if($request->file('foto')) {
            if($eskul->foto){
                Storage::delete($eskul->foto);
            }
            $validatedData['foto'] = $request->file('foto')->store('foto/eskul');
        }

        Eskul::where('id_eskul', $eskul->id_eskul)
            ->update($validatedData);

            if ($request->nama_eskul == $eskul->nama_eskul) {
                $pesan = "Data eskul $eskul->nama_eskul berhasil diubah";
            }else{
                $pesan = "Data eskul $eskul->nama_eskul berhasil diubah menjadi $request->nama_eskul";
            }

        return redirect('/dashboard/eskul')->with('berhasil', $pesan);
    }

    public function destroy(Eskul $eskul)
    {
        if ($eskul->foto) {
            Storage::delete($eskul->foto);
        }

        Eskul::destroy($eskul->id_eskul);

        return redirect('/dashboard/eskul')->with('berhasil', "Eskul $eskul->nama_eskul berhasil dihapus");
    }
}
