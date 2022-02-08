@extends('backend.layouts.main')

@section('konten')
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        @if (auth()->user()->id_eskul)
            <h1 class="h2">Ubah Data Prestasi Ekstrakulikuler {{ $tb_eskul->find(auth()->user()->id_eskul)->nama_prestasi }}</h1>
        @else
            <h1 class="h2">Ubah Data Prestasi</h1>
        @endif
    </div>

    <a href="/dashboard/prestasi" class="badge bg-success link-light text-decoration-none mb-4"><span data-feather="arrow-left-circle"></span> Kembali</a>

    <div class="col-lg-8">
        <form method="POST" action="/dashboard/prestasi/{{ $prestasi->id_prestasi }}" class="mb-5" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="mb-4 col-8">
                <label for="nama_prestasi" class="form-label">Nama Prestasi</label>
                <input type="text" name="nama_prestasi" class="form-control @error('nama_prestasi') is-invalid @enderror" id="nama_prestasi" required autofocus value="{{ old('nama_prestasi', $prestasi->nama_prestasi) }}">
                @error('nama_prestasi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-4 col-8">
                <label for="foto" class="form-label">Masukan gambar (Max 4 MB)</label>
                @if ($prestasi->bukti_foto)
                    <img src="{{ asset('storage/' . $prestasi->bukti_foto) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
                @else
                    <img class="img-preview img-fluid mb-3 col-sm-5">
                @endif
                <input class="form-control @error('bukti_foto') is-invalid @enderror" type="file" id="foto" name="bukti_foto" onchange="tampilFoto()">
                @error('bukti_foto')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
                @enderror
            </div>

            <div class="mb-4 col-8">
                <label for="peringkat" class="form-label">Peringkat</label>
                <input type="text" name="peringkat" class="form-control @error('peringkat') is-invalid @enderror" id="peringkat" required value="{{ old('peringkat', $prestasi->peringkat) }}">
                @error('peringkat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-4 col-8">
                <label for="tingkat" class="form-label">Tingkat</label>
                <input type="text" name="tingkat" class="form-control @error('tingkat') is-invalid @enderror" id="tingkat" required value="{{ old('tingkat', $prestasi->tingkat) }}">
                @error('tingkat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3 col-4">
                <label class="form-label">Tahun Prestasi</label>
                <select class="form-select @error('tahun_prestasi') is-invalid @enderror" name="tahun_prestasi">
                    <option value="">(Silakan pilih tahun)</option>
                    @for ($i = date('Y'); $i >= 2010; $i--)
                        @if (old('tahun_prestasi', $prestasi->tahun_prestasi) == $i)
                            <option value="{{ $i }}" selected>{{ $i }}</option>
                        @else
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endif
                    @endfor
                </select>
                @error('tahun_prestasi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            @can('admin')
            <div class="mb-5 col-4">
                <label for="eskul" class="form-label">Eskul</label>
                <select class="form-select @error('id_eskul') is-invalid @enderror" name="id_eskul">
                    <option value="">(Silakan pilih eskul)</option>
                    @foreach ($tb_eskul as $eskul)
                        @if (old('id_eskul', $prestasi->id_eskul) == $eskul->id_eskul)
                            <option value="{{ $eskul->id_eskul }}" selected>{{ $eskul->nama_eskul }}</option>
                        @else
                            <option value="{{ $eskul->id_eskul }}">{{ $eskul->nama_eskul }}</option>
                        @endif
                    @endforeach
                </select>
                @error('id_eskul')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            @endcan

            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

@endsection