@extends('backend.layouts.main')

@section('konten')

<div class="row my-3">
    <div class="col-lg-8">
      <h2 class="mb-0">Eskul {{ $eskul->nama_eskul }}</h2>
      <h6 class="mb-4">Jenis eskul: {{ $eskul->jenis }}</h6>

      <a href="/dashboard/eskul" class="btn btn-success"><span data-feather="arrow-left"></span> Kembali ke daftar eskul</a>
      <a href="/dashboard/eskul/{{ $eskul->id_eskul }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>

      <img src="{{ asset('storage/' . $eskul->foto) }}" alt="Gambar {{ $eskul->nama_eskul }}" class="d-block img-fluid mt-3 img-thumbnail" style="max-height: 200px;"> 

      <article class="my-3 fs-5">
        {!! $eskul->deskripsi !!}
      </article>
    </div>
  </div>

@endsection 