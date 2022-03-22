@extends('backend.layouts.main')

@section('konten')
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        @if (auth()->user()->id_eskul)
            <h1 class="h2">Ubah Data Pengurus Ekstrakulikuler {{ $eskul->find(auth()->user()->id_eskul)->nama_eskul }}</h1>
        @else
            <h1 class="h2">Ubah Data Pengurus</h1>
        @endif
    </div>

    <a href="/dashboard/pengurus" class="badge bg-success link-light text-decoration-none mb-4"><span data-feather="arrow-left-circle"></span> Kembali</a>

    <div class="col-lg-5">
        <form method="POST" action="/dashboard/pengurus/{{ $pengurus->id_pengurus }}" class="mb-5">
            @csrf
            @method('put')

            <div class="card">
                <div class="card-body">
                    @if (auth()->user()->id_eskul)
                        
                    @else
                        <h3>{{ $eskul->nama_eskul }}</h3>
                    @endif
                    

                    <table class="table table-bordered">
                        <tr class="table-primary">
                            <th class="align-middle">Pembina Ekstrakulikuler</th>
                            <td>
                                <input type="text" name="nama_pembina" class="form-control @error('nama_pembina') is-invalid @enderror" autofocus value="{{ old('nama_pembina',$pengurus->nama_pembina) }}">
                                @error('nama_pembina')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </td>
                        </tr>
                        <tr class="table-light">
                            <th>Ketua</th>
                            <td>
                                <select class="form-select @error('ketua') is-invalid @enderror" name="ketua">
                                    <option value="">(Silakan pilih ketua)</option>
                                    @foreach ($anggota_eskul as $anggota)
                                    @if (old('ketua', $pengurus->id_ketua) == $anggota->id_anggota)
                                        <option value="{{ $anggota->id_anggota }}" selected>{{ $anggota->nama_anggota }}</option>
                                    @else
                                        <option value="{{ $anggota->id_anggota }}">{{ $anggota->nama_anggota }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @error('ketua')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </td>
                        </tr>
                        <tr class="table-light">
                            <th>Wakil Ketua</th>
                            <td>
                                <select class="form-select @error('wakil') is-invalid @enderror" name="wakil">
                                    <option value="">(Silakan pilih wakil ketua)</option>
                                    @foreach ($anggota_eskul as $anggota)
                                    @if (old('wakil', $pengurus->id_wakil) == $anggota->id_anggota)
                                        <option value="{{ $anggota->id_anggota }}" selected>{{ $anggota->nama_anggota }}</option>
                                    @else
                                        <option value="{{ $anggota->id_anggota }}">{{ $anggota->nama_anggota }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @error('wakil')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </td>
                        </tr>
                        <tr class="table-light">
                            <th>Sekretaris</th>
                            <td>
                                <select class="form-select @error('sekretaris') is-invalid @enderror" name="sekretaris">
                                    <option value="">(Silakan pilih sekretaris)</option>
                                    @foreach ($anggota_eskul as $anggota)
                                    @if (old('sekretaris', $pengurus->id_sekretaris) == $anggota->id_anggota)
                                        <option value="{{ $anggota->id_anggota }}" selected>{{ $anggota->nama_anggota }}</option>
                                    @else
                                        <option value="{{ $anggota->id_anggota }}">{{ $anggota->nama_anggota }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @error('sekretaris')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </td>
                        </tr>
                        <tr class="table-light">
                            <th>Bendahara</th>
                            <td>
                                <select class="form-select @error('bendahara') is-invalid @enderror" name="bendahara">
                                    <option value="">(Silakan pilih bendahara)</option>
                                    @foreach ($anggota_eskul as $anggota)
                                    @if (old('bendahara', $pengurus->id_bendahara) == $anggota->id_anggota)
                                        <option value="{{ $anggota->id_anggota }}" selected>{{ $anggota->nama_anggota }}</option>
                                    @else
                                        <option value="{{ $anggota->id_anggota }}">{{ $anggota->nama_anggota }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @error('bendahara')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </td>
                        </tr>
                    </table>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </div>
                        
            
        </form>
    </div>

@endsection