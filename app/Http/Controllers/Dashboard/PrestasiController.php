<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Prestasi;
use App\Models\Eskul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PrestasiController extends Controller
{
    public function index()
    {
        $dataPrestasi = (auth()->user()->id_eskul) 
            ? Prestasi::where('id_eskul', auth()->user()->id_eskul)->get() 
            : Prestasi::all();

        return view('dashboard.pages.prestasi.index', [
            'tb_prestasi' => $dataPrestasi,
            'tb_eskul' => Eskul::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.pages.prestasi.create', [
            'tb_eskul' => Eskul::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_prestasi' => 'required|max:255|regex:/^[a-zA-Z0-9\s]+$/',
            'bukti_foto' => 'required|image|file|max:1024',
            'peringkat' => 'required|regex:/^[a-zA-Z0-9\s]+$/',
            'tingkat' => 'required|alpha',
            'tahun_prestasi' => 'required|numeric'
        ]);

        $validatedData['id_eskul'] = (auth()->user()->id_eskul)
            ? auth()->user()->id_eskul
            : $request->validate(['id_eskul' => 'required'])['id_eskul'];

        $validatedData['bukti_foto'] = $request->file('bukti_foto')->store('foto/prestasi');

        Prestasi::create($validatedData);

        return redirect('/dashboard/prestasi')->with('berhasil', 'Data prestasi berhasil ditambah!');
    }

    public function edit(Prestasi $prestasi)
    {
        return view('dashboard.pages.prestasi.edit', [
            'prestasi' => $prestasi,
            'tb_eskul' => Eskul::all()
        ]);
    }

    public function update(Request $request, Prestasi $prestasi)
    {
        $validatedData = $request->validate([
            'nama_prestasi' => 'required|max:255|regex:/^[a-zA-Z0-9\s]+$/',
            'bukti_foto' => 'image|file|max:1024',
            'peringkat' => 'required|regex:/^[a-zA-Z0-9\s]+$/',
            'tingkat' => 'required|alpha',
            'tahun_prestasi' => 'required|numeric'
        ]);

        $validatedData['id_eskul'] = (auth()->user()->id_eskul)
            ? auth()->user()->id_eskul
            : $request->validate(['id_eskul' => 'required'])['id_eskul'];

        if($request->file('bukti_foto')) {
            Storage::delete($prestasi->bukti_foto);
            $validatedData['bukti_foto'] = $request->file('bukti_foto')->store('foto/prestasi');
        }

        Prestasi::where('id_prestasi', $prestasi->id_prestasi)
            ->update($validatedData);

        return redirect('/dashboard/prestasi')->with('berhasil', 'Data prestasi berhasil diubah!');
    }

    public function destroy(Prestasi $prestasi)
    {
        Storage::delete($prestasi->foto);
        Prestasi::destroy($prestasi->id_prestasi);

        return redirect('/dashboard/prestasi')->with('berhasil', "prestasi $prestasi->nama_prestasi berhasil dihapus");
    }
}
