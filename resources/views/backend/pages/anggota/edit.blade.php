@extends('backend.layouts.main')

@section('konten')
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        @if (auth()->user()->id_eskul)
            <h1 class="h2">Ubah Data Anggota Ekstrakulikuler {{ $tb_eskul->find(auth()->user()->id_eskul)->nama_eskul }}</h1>
        @else
            <h1 class="h2">Ubah Data Anggota</h1>
        @endif
    </div>

    <a href="/dashboard/anggota" class="badge bg-success link-light text-decoration-none mb-4"><span data-feather="arrow-left-circle"></span> Kembali</a>

    <div class="col-lg-8">
        <form method="POST" action="/dashboard/anggota/{{ $anggota->id_anggota }}" class="mb-5">
            @csrf
            @method('put')

            <div class="mb-3 col-8">
                <label for="nis" class="form-label">Nomor Induk Siswa</label>
                <input type="number" name="nis" class="form-control @error('nis') is-invalid @enderror" id="nis" required autofocus value="{{ old('nis', $anggota->nis) }}">
                <div class="form-text">NIS harus berisi 9 digit angka</div>
                @error('nis')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <div class="mb-3 col-8">
                <label for="nama_anggota" class="form-label">Nama Anggota</label>
                <input type="text" name="nama_anggota" class="form-control @error('nama_anggota') is-invalid @enderror" id="nama_anggota" required value="{{ old('nama_anggota', $anggota->nama_anggota) }}">
                <div class="form-text">Nama anggota hanya bisa diisi oleh huruf dan spasi</div>
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
                        @if (old('tahun_gabung', $anggota->tahun_gabung) == $i)
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
                <select class="form-select @error('jurusan') is-invalid @enderror" name="jurusan">
                    <option value="">(Silakan pilih jurusan)</option>
                    @foreach ($tb_jurusan as $jurusan)
                        @if (old('jurusan', $anggota->id_jurusan) == $jurusan->id_jurusan)
                            <option value="{{ $jurusan->id_jurusan }}" selected>{{ $jurusan->nama_jurusan }}</option>
                        @else
                            <option value="{{ $jurusan->id_jurusan }}">{{ $jurusan->nama_jurusan }}</option>
                        @endif
                    @endforeach
                </select>
                @error('jurusan')
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
                        @if (old('eskul', $anggota->id_eskul) == $eskul->id_eskul)
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