<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Akun;
use App\Models\Eskul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class PetugasController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.petugas.index', [
            'petugas' => Akun::where('level', 'Petugas')->get(),
            'eskul' => Eskul::all()
        ]);
    }

    public function create()
    {
        return view('dashboard.pages.petugas.create', [
            'eskul' => Eskul::all()
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_petugas' => 'required|max:255|alpha',
            'username' => 'required|min:4|max:255|alpha_num',
            'password' => 'required|min:8|max:255|alpha_num',
            'id_eskul' => 'required|numeric'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        Akun::create($validatedData);

        return redirect('/dashboard/petugas')->with('berhasil', 'Data petugas berhasil ditambah!');
    }

    public function edit(Akun $akun)
    {
        return view('dashboard.pages.petugas.edit',[
            'petugas' => $akun,
            'eskul' => Eskul::all()
        ]);
    }

    public function update(Request $request, Akun $akun)
    {
        $validatedData = $request->validate([
            'nama_petugas' => 'required|max:255|alpha',
            'username' => 'required|min:4|max:255|alpha_num',
            'id_eskul' => 'required|numeric'
        ]);

        if ($request->password) {
            $plainPassword = $request->validate([
                'password' => 'required|min:8|max:255|alpha_num'
            ]);

            $validatedData['password'] = Hash::make($plainPassword['password']);
        };

        Akun::where('id_akun', $akun->id_akun)
                ->update($validatedData);

        return redirect('/dashboard/petugas')->with('berhasil', "Data petugas $akun->nama_petugas berhasil diubah");
    }

    public function destroy(Akun $akun)
    {
        Akun::destroy($akun->id_akun);

        return redirect('/dashboard/petugas')->with('berhasil', "Data petugas $akun->nama_petugas berhasil dihapus");
    }
}
