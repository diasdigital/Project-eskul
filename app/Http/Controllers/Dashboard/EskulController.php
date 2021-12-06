<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Eskul;
use Illuminate\Http\Request;

class EskulController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.eskul.index', [
            'eskul' => Eskul::all()
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
            'foto' => 'required|file|max:1024',
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
        return view('dashboard.pages.eskul.show', [
            'eskul' => $eskul
        ]);
    }

    public function edit(Eskul $eskul)
    {
        //
    }

    public function update(Request $request, Eskul $eskul)
    {
        //
    }

    public function destroy(Eskul $eskul)
    {
        //
    }
}
