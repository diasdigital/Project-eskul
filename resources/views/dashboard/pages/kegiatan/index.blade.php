@extends('dashboard.layouts.main')

@section('konten')

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    @if (auth()->user()->id_eskul)
        <h1 class="h2">Daftar Kegiatan Ekstrakulikuler {{ $tb_eskul->find(auth()->user()->id_eskul)->nama_eskul }}</h1>
    @else
      <h1 class="h2">Daftar Semua Kegiatan</h1>
    @endif
  </div>

  <div class="table-responsive">
    <a href="/dashboard/kegiatan/create" class="btn btn-primary mb-3">Tambah Kegiatan Baru</a>
    
    @if (session()->has('berhasil'))
        <div class="alert alert-success" role="alert">
          {{ session('berhasil') }}
        </div>
    @endif

    @if ($tb_kegiatan->count())
    
    <table class="table table-striped">
      <thead class="table-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama Kegiatan</th>
          <th scope="col">Deskripsi</th>
          <th scope="col">Tempat</th>
          <th scope="col">Tanggal Pelaksanaan</th>
          @if (!auth()->user()->id_eskul)
             <th scope="col">Eskul</th> 
          @endif
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($tb_kegiatan as $kegiatan)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $kegiatan->nama_kegiatan }}</td>
          <td>{!! $kegiatan->deskripsi !!}</td>
          <td>{{ $kegiatan->tempat }}</td>
          <td>{{ $kegiatan->tanggal_pelaksanaan }}</td>
            @if (!auth()->user()->id_eskul)
              @foreach ($tb_eskul as $eskul)
                @if ($eskul->id_eskul == $kegiatan->id_eskul)
                    <td>{{ $eskul->nama_eskul }}</td>
                @endif
              @endforeach
            @endif
          <td>
            <a href="/dashboard/kegiatan/{{ $kegiatan->id_kegiatan }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
            <form action="/dashboard/kegiatan/{{ $kegiatan->id_kegiatan }}" method="POST" class="d-inline">
              @method('delete')
              @csrf
              <button class="bange bg-danger border-0 text-white" onclick="return confirm('Apa kamu yakin ingin menghapus kegiatan {{ $kegiatan->nama_kegiatan }}?')"><span data-feather="trash-2"></span></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    @else
        <h3 class="text-center mt-4">Tidak ada data kegiatan</h3>
    @endif

  </div>

@endsection