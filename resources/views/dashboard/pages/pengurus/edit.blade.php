@extends('dashboard.layouts.main')

@section('konten')
    
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        @if (auth()->user()->id_eskul)
            <h1 class="h2">Ubah Data Pengurus Ekstrakulikuler {{ $eskul->find(auth()->user()->id_eskul)->nama_eskul }}</h1>
        @else
            <h1 class="h2">Ubah Data Pengurus</h1>
        @endif
    </div>

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
                                <select class="form-select @error('id_ketua') is-invalid @enderror" name="id_ketua">
                                    <option value="">(Silakan pilih ketua)</option>
                                    @foreach ($anggota_eskul as $anggota)
                                    @if (old('id_ketua', $pengurus->id_ketua) == $anggota->id_anggota)
                                        <option value="{{ $anggota->id_anggota }}" selected>{{ $anggota->nama_anggota }}</option>
                                    @else
                                        <option value="{{ $anggota->id_anggota }}">{{ $anggota->nama_anggota }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @error('id_ketua')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </td>
                        </tr>
                        <tr class="table-light">
                            <th>Wakil Ketua</th>
                            <td>
                                <select class="form-select @error('id_wakil') is-invalid @enderror" name="id_wakil">
                                    <option value="">(Silakan pilih wakil ketua)</option>
                                    @foreach ($anggota_eskul as $anggota)
                                    @if (old('id_wakil', $pengurus->id_wakil) == $anggota->id_anggota)
                                        <option value="{{ $anggota->id_anggota }}" selected>{{ $anggota->nama_anggota }}</option>
                                    @else
                                        <option value="{{ $anggota->id_anggota }}">{{ $anggota->nama_anggota }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @error('id_wakil')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </td>
                        </tr>
                        <tr class="table-light">
                            <th>Sekretaris</th>
                            <td>
                                <select class="form-select @error('id_sekretaris') is-invalid @enderror" name="id_sekretaris">
                                    <option value="">(Silakan pilih sekretaris)</option>
                                    @foreach ($anggota_eskul as $anggota)
                                    @if (old('id_sekretaris', $pengurus->id_sekretaris) == $anggota->id_anggota)
                                        <option value="{{ $anggota->id_anggota }}" selected>{{ $anggota->nama_anggota }}</option>
                                    @else
                                        <option value="{{ $anggota->id_anggota }}">{{ $anggota->nama_anggota }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @error('id_sekretaris')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </td>
                        </tr>
                        <tr class="table-light">
                            <th>Bendahara</th>
                            <td>
                                <select class="form-select @error('id_bendahara') is-invalid @enderror" name="id_bendahara">
                                    <option value="">(Silakan pilih bendahara)</option>
                                    @foreach ($anggota_eskul as $anggota)
                                    @if (old('id_bendahara', $pengurus->id_bendahara) == $anggota->id_anggota)
                                        <option value="{{ $anggota->id_anggota }}" selected>{{ $anggota->nama_anggota }}</option>
                                    @else
                                        <option value="{{ $anggota->id_anggota }}">{{ $anggota->nama_anggota }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @error('id_bendahara')
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