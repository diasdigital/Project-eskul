<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        return view('dashboard.jurusan.index', [
            'jurusan' => Jurusan::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.jurusan.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_jurusan' => 'required|max:255'
        ]);

        Jurusan::create($validatedData);

        return redirect('/dashboard/jurusan')->with('berhasil', 'Data jurusan berhasil ditambah!');
    }

    public function edit(Jurusan $jurusan)
    {
        return view('dashboard.jurusan.edit', [
            'jurusan' => $jurusan
        ]);
    }

    public function update(Request $request, Jurusan $jurusan)
    {
        $validatedData = $request->validate([
            'nama_jurusan' => 'required|max:255'
        ]);

        Jurusan::where('id_jurusan', $jurusan->id_jurusan)
                ->update($validatedData);

        return redirect('/dashboard/jurusan')->with('berhasil', 'Data jurusan berhasil diubah!');
    }

    public function destroy(Jurusan $jurusan)
    {
        Jurusan::destroy($jurusan->id_jurusan);

        return redirect('/dashboard/jurusan')->with('berhasil', "Jurusan \"$jurusan->nama_jurusan\" berhasil dihapus");
    }
}
