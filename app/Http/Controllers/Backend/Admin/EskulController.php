<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Eskul;
use App\Models\Pengurus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class EskulController extends Controller
{
    public function buatSlug($nama_eskul, $delimiter = '-')
    {
        $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, iconv('UTF-8', 'ASCII//TRANSLIT', $nama_eskul))), $delimiter));
        return $slug;
    }

    public function index()
    {
        return view('backend.pages.eskul.index', [
            'tb_eskul' => Eskul::all()
        ]);
    }

    public function create()
    {
        return view('backend.pages.eskul.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_eskul' => 'required|unique:tb_eskul|max:255|regex:/^[a-zA-Z\s]+$/',
            'foto' => 'required|image|file|max:4096',
            'jenis' => 'required',
            'deskripsi' => 'required',
            'nama_pembina' => 'required|regex:/^[a-zA-Z\s]+$/'
        ]);

        $validatedData['foto'] = $request->file('foto')->store('foto/eskul');
        $validatedData['slug'] = $this->buatSlug($request->nama_eskul);

        Eskul::create($validatedData);

        $kepengurusanKosong = [
            'id_eskul' => ((Eskul::select('id_eskul')->get())->last())->id_eskul,
            'nama_pembina' => $request->nama_pembina
        ];
        Pengurus::create($kepengurusanKosong);

        return redirect('/dashboard/eskul')->with('berhasil', 'Data eskul berhasil ditambah');
    }

    public function show(Eskul $eskul)
    {        
        return view('backend.pages.eskul.show', [
            'eskul' => $eskul
        ]);
    }

    public function edit(Eskul $eskul)
    {
        return view('backend.pages.eskul.edit', [
            'eskul' => $eskul
        ]);
    }

    public function update(Request $request, Eskul $eskul)
    {
        $rules = [
            'foto' => 'image|file|max:4096',
            'jenis' => 'required',
            'deskripsi' => 'required'
        ];

        if ($request->nama_eskul != $eskul->nama_eskul) {
            $rules['nama_eskul'] = 'required|unique:tb_eskul|max:255|regex:/^[a-zA-Z\s]+$/';
        }

        $validatedData = $request->validate($rules);

        if (isset($rules['nama_eskul'])) {
            $validatedData['slug'] = $this->buatSlug($request->nama_eskul);
        }

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
}
