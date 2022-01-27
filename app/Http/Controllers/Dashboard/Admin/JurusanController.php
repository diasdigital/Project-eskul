<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.jurusan.index', [
            'tb_jurusan' => Jurusan::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.pages.jurusan.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_jurusan' => 'required|unique:tb_jurusan|max:255|regex:/^[a-zA-Z\s]+$/'
        ]);

        Jurusan::create($validatedData);

        return redirect('/dashboard/jurusan')->with('berhasil', 'Data jurusan berhasil ditambah');
    }

    public function edit(Jurusan $jurusan)
    {
        return view('dashboard.pages.jurusan.edit', [
            'jurusan' => $jurusan
        ]);
    }

    public function update(Request $request, Jurusan $jurusan)
    {
        if ($request->nama_jurusan != $jurusan->nama_jurusan) {
            $rules['nama_jurusan'] = 'required|unique:tb_jurusan|max:255|regex:/^[a-zA-Z\s]+$/';
        }

        $validatedData = $request->validate([
            'nama_jurusan' => 'required|max:255|regex:/^[a-zA-Z\s]+$/'
        ]);

        Jurusan::where('id_jurusan', $jurusan->id_jurusan)
                ->update($validatedData);

        return redirect('/dashboard/jurusan')->with('berhasil', "Data jurusan $jurusan->nama_jurusan berhasil diubah menjadi $request->nama_jurusan");
    }
}
