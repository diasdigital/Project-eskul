@extends('dashboard.layouts.main')

@section('konten')
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Data Petugas</h1>
    </div>

    <div class="col-lg-8">
        <form method="POST" action="/dashboard/petugas/{{ $petugas->id_akun }}" class="mb-5">
            @csrf
            @method('put')

            <div class="mb-3">
                <label for="nama_petugas" class="form-label">Nama Petugas</label>
                <input type="text" name="nama_petugas" class="form-control @error('nama_petugas') is-invalid @enderror" id="nama_petugas" required autofocus value="{{ old('nama_petugas', $petugas->nama_petugas) }}">
                @error('nama_petugas')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" id="username" required value="{{ old('username', $petugas->username) }}">
                @error('username')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <div id="tipsUsername" class="form-text">
                    Username harus berisi minimal 4 karakter, terdiri dari huruf dan angka
                </div>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" value="{{ old('password') }}">
                @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                <div id="tipsPassword" class="form-text">
                    Password harus berisi 8-20 karakter, terdiri dari huruf dan angka
                </div>
            </div>

            <div class="mb-5 col-4">
                <label for="eskul" class="form-label">Eskul</label>
                <select class="form-select" name="id_eskul">
                    @foreach ($tb_eskul as $eskul)
                    @if (old('id_eskul', $petugas->id_eskul) == $eskul->id_eskul)
                        <option value="{{ $eskul->id_eskul }}" selected>{{ $eskul->nama_eskul }}</option>
                    @else
                        <option value="{{ $eskul->id_eskul }}">{{ $eskul->nama_eskul }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
                        
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

@endsection