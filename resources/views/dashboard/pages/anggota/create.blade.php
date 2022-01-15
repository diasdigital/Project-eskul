@extends('dashboard.layouts.main')

@section('konten')
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Tambah Data Anggota</h1>
    </div>

    <div class="col-lg-8">
        <form method="POST" action="/dashboard/anggota" class="mb-5">
            @csrf

            <div class="mb-3">
                <label for="nis" class="form-label">Nomor Induk Siswa</label>
                <input type="number" name="nis" class="form-control @error('nis') is-invalid @enderror" id="nis" required value="{{ old('nis') }}">
                @error('nis')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="nama_anggota" class="form-label">Nama Anggota</label>
                <input type="text" name="nama_anggota" class="form-control @error('nama_anggota') is-invalid @enderror" id="nama_anggota" required value="{{ old('nama_anggota') }}">
                @error('nama_anggota')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3 col-4">
                <label class="form-label">Tahun Bergabung</label>
                <select class="form-select @error('tahun_gabung') is-invalid @enderror" name="tahun_gabung">
                    <option value="">(Silakan pilih tahun)</option>
                    @for ($i = date('Y'); $i >= 2010; $i--)
                        @if (old('tahun_gabung') == $i)
                            <option value="{{ $i }}" selected>{{ $i }}</option>
                        @else
                            <option value="{{ $i }}">{{ $i }}</option>
                        @endif
                    @endfor
                </select>
                @error('tahun_gabung')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3 col-4">
                <label for="jurusan" class="form-label">Jurusan</label>
                <select class="form-select @error('id_jurusan') is-invalid @enderror" name="id_jurusan">
                    <option value="">(Silakan pilih jurusan)</option>
                    @foreach ($tb_jurusan as $jurusan)
                        @if (old('id_jurusan') == $jurusan->id_jurusan)
                            <option value="{{ $jurusan->id_jurusan }}" selected>{{ $jurusan->nama_jurusan }}</option>
                        @else
                            <option value="{{ $jurusan->id_jurusan }}">{{ $jurusan->nama_jurusan }}</option>
                        @endif
                    @endforeach
                </select>
                @error('id_jurusan')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-5 col-4">
                <label for="eskul" class="form-label">Eskul</label>
                <select class="form-select @error('id_eskul') is-invalid @enderror" name="id_eskul">
                    <option value="">(Silakan pilih eskul)</option>
                    @foreach ($tb_eskul as $eskul)
                        @if (old('id_eskul') == $eskul->id_eskul)
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
                        
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

@endsection