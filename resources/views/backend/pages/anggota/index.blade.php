@extends('backend.layouts.main')

@section('konten')

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    @if (auth()->user()->id_eskul)
        <h1 class="h2">Daftar Anggota Ekstrakulikuler {{ $tb_eskul->find(auth()->user()->id_eskul)->nama_eskul }}</h1>
    @else
      <h1 class="h2">Daftar Semua Anggota</h1>
    @endif
  </div>

  <div class="table-responsive">
    <a href="/dashboard/anggota/create" class="btn btn-primary mb-3">Tambah Anggota Baru</a>
    
    @if (session()->has('berhasil'))
        <div class="alert alert-success" role="alert">
          {{ session('berhasil') }}
        </div>
    @endif

    @if ($tb_anggota->count())
    
    <table class="table table-striped">
      <thead class="table-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">NIS</th>
          <th scope="col">Nama Anggota</th>
          <th scope="col">Tahun Bergabung</th>
          <th scope="col">Jurusan</th>
          @if (!auth()->user()->id_eskul)
             <th scope="col">Eskul</th> 
          @endif
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($tb_anggota as $anggota)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $anggota->nis }}</td>
          <td>{{ $anggota->nama_anggota }}</td>
          <td>{{ $anggota->tahun_gabung }}</td>
            @foreach ($tb_jurusan as $jurusan)
              @if ($jurusan->id_jurusan == $anggota->id_jurusan)
                  <td>{{ $jurusan->nama_jurusan }}</td>
              @endif
            @endforeach
            @if (!auth()->user()->id_eskul)
              @foreach ($tb_eskul as $eskul)
                @if ($eskul->id_eskul == $anggota->id_eskul)
                    <td>{{ $eskul->nama_eskul }}</td>
                @endif
              @endforeach
            @endif
          <td>
            <a href="/dashboard/anggota/{{ $anggota->id_anggota }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
            <form action="/dashboard/anggota/{{ $anggota->id_anggota }}" method="POST" class="d-inline">
              @method('delete')
              @csrf
              <button class="bange bg-danger border-0 text-white" onclick="return confirm('Apa kamu yakin ingin menghapus anggota {{ $anggota->nama_anggota }}?')"><span data-feather="trash-2"></span></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    @else
        <h3 class="text-center mt-4">Tidak ada data anggota</h3>
    @endif

  </div>

@endsection