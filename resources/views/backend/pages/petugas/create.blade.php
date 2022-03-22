@extends('backend.layouts.main')

@section('konten')
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Data Petugas</h1>
    </div>

    <a href="/dashboard/petugas" class="badge bg-success link-light text-decoration-none mb-4"><span data-feather="arrow-left-circle"></span> Kembali</a>

    <div class="col-lg-8">
        <form method="POST" action="/dashboard/petugas" class="mb-5">
            @csrf

            <div class="mb-3 col-8">
                <label for="nama_petugas" class="form-label">Nama Petugas</label>
                <input type="text" name="nama_petugas" class="form-control @error('nama_petugas') is-invalid @enderror" id="nama_petugas" required autofocus value="{{ old('nama_petugas') }}">
                <div class="form-text">Nama jurusan hanya bisa diisi oleh huruf dan spasi</div>
                @error('nama_petugas')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3 col-8">
                <label for="username" class="form-label">Nama Pengguna</label>
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" required value="{{ old('username') }}">
                <div class="form-text">Nama pengguna hanya bisa diisi oleh huruf dan angka dengan panjang minimal 4 karakter</div>
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3 col-8">
                <label for="password" class="form-label">Kata Sandi</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" required value="{{ old('password') }}">
                <div class="form-text">Password hanya bisa diisi oleh huruf dan angka dengan dengan panjang minimal 8 karakter</div>
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-5 col-4">
                <label for="eskul" class="form-label">Eskul</label>
                <select class="form-select @error('eskul') is-invalid @enderror" name="eskul">
                    <option value="">(Silakan pilih eskul)</option>
                    @foreach ($tb_eskul as $eskul)
                    @if (old('eskul') == $eskul->id_eskul)
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
                        
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

@endsection