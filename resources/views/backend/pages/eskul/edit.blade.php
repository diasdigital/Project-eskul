@extends('backend.layouts.main')

@section('konten')
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ubah Data Eskul</h1>
    </div>

    <div class="col-lg-8">
        <form method="POST" action="/dashboard/eskul/{{ $eskul->id_eskul }}" class="mb-5" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="mb-4 col-8">
                <label for="nama_eskul" class="form-label">Nama Ekstrakulikuler</label>
                <input type="text" name="nama_eskul" class="form-control @error('nama_eskul') is-invalid @enderror" id="nama_eskul" required autofocus value="{{ old('nama_eskul', $eskul->nama_eskul) }}">
                @error('nama_eskul')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-4 col-6">
                <label for="foto" class="form-label">Masukan gambar (Max 4 MB)</label>
                @if ($eskul->foto)
                    <img src="{{ asset('storage/' . $eskul->foto) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                @else
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                @endif
                <input class="form-control @error('foto') is-invalid @enderror" type="file" id="foto" name="foto" onchange="tampilFoto()">
                @error('foto')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-4 col-8">
                <label class="form-label">Jenis Ekstrakulikuler:</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis" id="wajib" value="Wajib" {{ ($eskul->jenis == 'Wajib') ? 'checked' : '' }}>
                    <label class="form-check-label" for="wajib">
                    Wajib
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="jenis" id="nonwajib" value="Non Wajib" {{ ($eskul->jenis == 'Non Wajib') ? 'checked' : '' }}>
                    <label class="form-check-label" for="nonwajib">
                    Non Wajib
                    </label>
                </div>
            </div>

              <div class="mb-4 col-8">
                <label for="d" class="form-label">Deskripsi</label>
                    <input id="d" type="hidden" name="deskripsi" value="{{ old('deskripsi', $eskul->deskripsi) }}">
                    <trix-editor input="d"></trix-editor>
                @error('deskripsi')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                </div>
                        
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

@endsection