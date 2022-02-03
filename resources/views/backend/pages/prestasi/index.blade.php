@extends('backend.layouts.main')

@section('konten')

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    @if (auth()->user()->id_eskul)
        <h1 class="h2">Daftar Prestasi Ekstrakulikuler {{ $tb_eskul->find(auth()->user()->id_eskul)->nama_eskul }}</h1>
    @else
      <h1 class="h2">Daftar Semua Prestasi</h1>
    @endif
  </div>

  <div class="table-responsive">
    <a href="/dashboard/prestasi/create" class="btn btn-primary mb-3">Tambah Prestasi Baru</a>
    
    @if (session()->has('berhasil'))
        <div class="alert alert-success" role="alert">
          {{ session('berhasil') }}
        </div>
    @endif

    @if ($tb_prestasi->count())
    
    <table class="table table-striped">
      <thead class="table-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Foto</th>
          <th scope="col">Nama Prestasi</th>
          <th scope="col">Peringkat</th>
          <th scope="col">Tingkat</th>
          <th scope="col">Tahun</th>
          @if (!auth()->user()->id_eskul)
             <th scope="col">Eskul</th> 
          @endif
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($tb_prestasi as $prestasi)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td class="col-2"><img src="{{ asset('storage/' . $prestasi->bukti_foto) }}" alt="{{ $prestasi->nama_prestasi }}" style="max-height: 100px"></td>
          <td>{{ $prestasi->nama_prestasi }}</td>
          <td>{{ $prestasi->peringkat }}</td>
          <td>{{ $prestasi->tingkat }}</td>
          <td>{{ $prestasi->tahun_prestasi }}</td>
            @if (!auth()->user()->id_eskul)
              @foreach ($tb_eskul as $eskul)
                @if ($eskul->id_eskul == $prestasi->id_eskul)
                    <td>{{ $eskul->nama_eskul }}</td>
                @endif
              @endforeach
            @endif
          <td>
            <a href="/dashboard/prestasi/{{ $prestasi->id_prestasi }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
            @can('admin')
            <form action="/dashboard/prestasi/{{ $prestasi->id_prestasi }}" method="POST" class="d-inline">
              @method('delete')
              @csrf
              <button class="bange bg-danger border-0 text-white" onclick="return confirm('Apa kamu yakin ingin menghapus prestasi {{ $prestasi->nama_prestasi }}?')"><span data-feather="trash-2"></span></button>
            </form>
            @endcan
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    @else
        <h3 class="text-center mt-4">Tidak ada data prestasi</h3>
    @endif

  </div>

@endsection