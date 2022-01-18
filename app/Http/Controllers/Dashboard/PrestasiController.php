<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Prestasi;
use App\Models\Eskul;
use Illuminate\Http\Request;

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
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function edit(Prestasi $prestasi)
    {
        //
    }

    public function update(Request $request, Prestasi $prestasi)
    {
        //
    }

    public function destroy(Prestasi $prestasi)
    {
        //
    }
}
