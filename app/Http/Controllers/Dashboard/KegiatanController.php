<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use App\Models\Eskul;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    public function index()
    {
        $dataKegiatan = (auth()->user()->id_eskul) 
            ? Kegiatan::where('id_eskul', auth()->user()->id_eskul)->get() 
            : Kegiatan::all();

        return view('dashboard.pages.kegiatan.index', [
            'tb_kegiatan' => $dataKegiatan,
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

    public function edit(Kegiatan $kegiatan)
    {
        //
    }

    public function update(Request $request, Kegiatan $kegiatan)
    {
        //
    }

    public function destroy(Kegiatan $kegiatan)
    {
        //
    }
}
