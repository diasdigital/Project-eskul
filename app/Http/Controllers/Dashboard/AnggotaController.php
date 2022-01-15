<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    public function index()
    {
        return view('dashboard.pages.anggota.index', [
            'tb_anggota' => Anggota::all()
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

    public function show(Anggota $anggota)
    {
        //
    }

    public function edit(Anggota $anggota)
    {
        //
    }

    public function update(Request $request, Anggota $anggota)
    {
        //
    }

    public function destroy(Anggota $anggota)
    {
        //
    }
}
