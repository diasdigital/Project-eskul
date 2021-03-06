@extends('backend.layouts.main')

@section('konten')
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        @if (auth()->user()->id_eskul)
            <h1 class="h2">Ubah Data Kegiatan Ekstrakulikuler {{ $tb_eskul->find(auth()->user()->id_eskul)->nama_eskul }}</h1>
        @else
            <h1 class="h2">Ubah Data Kegiatan</h1>
        @endif
    </div>

    <a href="/dashboard/kegiatan" class="badge bg-success link-light text-decoration-none mb-4"><span data-feather="arrow-left-circle"></span> Kembali</a>

    <div class="col-lg-8">
        <form method="POST" action="/dashboard/kegiatan/{{ $kegiatan->id_kegiatan }}" class="mb-5">
            @csrf
            @method('put')

            <div class="mb-3 col-8">
                <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                <input type="text" name="nama_kegiatan" class="form-control @error('nama_kegiatan') is-invalid @enderror" id="nama_kegiatan" required autofocus value="{{ old('nama_kegiatan', $kegiatan->nama_kegiatan) }}">
                <div class="form-text">Nama kegiatan hanya bisa diisi oleh huruf dan spasi</div>
                @error('nama_kegiatan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-4 col-8">
                <label for="d" class="form-label">Deskripsi</label>
                    <input id="d" type="hidden" name="deskripsi" value="{{ old('deskripsi', $kegiatan->deskripsi) }}">
                    <trix-editor input="d"></trix-editor>
                @error('deskripsi')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-3 col-8">
                <label for="tempat" class="form-label">Tempat</label>
                <input type="text" name="tempat" class="form-control @error('tempat') is-invalid @enderror" id="tempat" required value="{{ old('tempat', $kegiatan->tempat) }}">
                @error('tempat')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3 col-8">
                <label for="tanggal_pelaksanaan" class="form-label">Tanggal Pelaksanaan</label>
                <input type="date" name="tanggal_pelaksanaan" class="form-control @error('tanggal_pelaksanaan') is-invalid @enderror" id="tanggal_pelaksanaan" required value="{{ old('tanggal_pelaksanaan', $kegiatan->tanggal_pelaksanaan) }}">
                @error('tanggal_pelaksanaan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            @can('admin')
            <div class="mb-5 col-4">
                <label for="eskul" class="form-label">Eskul</label>
                <select class="form-select @error('eskul') is-invalid @enderror" name="eskul">
                    <option value="">(Silakan pilih eskul)</option>
                    @foreach ($tb_eskul as $eskul)
                        @if (old('eskul', $kegiatan->id_eskul) == $eskul->id_eskul)
                            <option value="{{ $eskul->id_eskul }}" selected>{{ $eskul->nama_eskul }}</option>
                        @else
                            <option value="{{ $eskul->id_eskul }}">{{ $eskul->nama_eskul }}</option>
                        @endif
                    @endforeach
                </select>
                @error('eskul')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            @endcan
                        
            <button type="submit" class="btn btn-primary">Simpan perubahan</button>
        </form>
    </div>

@endsection