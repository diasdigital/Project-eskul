<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Akun;
use App\Models\Eskul;
use App\Models\Kegiatan;
use App\Models\Pengurus;
use App\Models\Prestasi;
use App\Models\Anggota;
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
            'nama_eskul' => 'required|unique:tb_eskul|max:255|regex:/^[a-zA-Z\s]+$/',
            'foto' => 'required|image|file|max:4096',
            'jenis' => 'required|alpha',
            'deskripsi' => 'required'
        ]);

        $validatedData['foto'] = $request->file('foto')->store('foto/eskul');

        Eskul::create($validatedData);

        $kepengurusanKosong = [
            'id_eskul' => ((Eskul::select('id_eskul')->get())->last())->id_eskul
        ];
        Pengurus::create($kepengurusanKosong);

        return redirect('/dashboard/eskul')->with('berhasil', 'Data eskul berhasil ditambah');
    }

    public function show(Eskul $eskul)
    {        
        return view('dashboard.pages.eskul.show', [
            'eskul' => $eskul
        ]);
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
            'nama_eskul' => 'required|unique:tb_eskul|max:255|regex:/^[a-zA-Z\s]+$/',
            'foto' => 'image|file|max:4096',
            'jenis' => 'required|alpha',
            'deskripsi' => 'required'
        ]);

        if($request->file('foto')) {
            Storage::delete($eskul->foto);
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
        Storage::delete($eskul->foto);
        Eskul::destroy($eskul->id_eskul);
        Pengurus::destroy($eskul->id_eskul);
        Akun::where('id_eskul', $eskul->id_eskul)->delete();
        Prestasi::where('id_eskul', $eskul->id_eskul)->delete();
        Kegiatan::where('id_eskul', $eskul->id_eskul)->delete();
        Anggota::where('id_eskul', $eskul->id_eskul)->delete();

        return redirect('/dashboard/eskul')->with('berhasil', "Eskul $eskul->nama_eskul berhasil dihapus");
    }
}
