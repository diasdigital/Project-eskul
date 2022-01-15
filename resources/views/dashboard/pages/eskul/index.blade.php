@extends('dashboard.layouts.main')

@section('konten')

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar Ekstrakulikuler</h1>
  </div>

  <div class="table-responsive">
    <a href="/dashboard/eskul/create" class="btn btn-primary mb-3">Tambah Eskul Baru</a>
    
    @if (session()->has('berhasil'))
        <div class="alert alert-success" role="alert">
          {{ session('berhasil') }}
        </div>
    @endif

    @if ($tb_eskul->count())
    
    <table class="table table-striped">
      <thead class="table-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Foto</th>
          <th scope="col">Nama Eskul</th>
          <th scope="col">Jenis</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($tb_eskul as $eskul)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td class="col-2"><img src="{{ asset('storage/' . $eskul->foto) }}" alt="{{ $eskul->nama_eskul }}" style="max-height: 100px"></td>
          <td>{{ $eskul->nama_eskul }}</td>
          <td>{{ $eskul->jenis }}</td>
          <td>
            <a href="/dashboard/eskul/{{ $eskul->id_eskul }}" class="badge bg-info"><span data-feather="file-text"></span></a>
            <a href="/dashboard/eskul/{{ $eskul->id_eskul }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
            <form action="/dashboard/eskul/{{ $eskul->id_eskul }}" method="POST" class="d-inline">
              @method('delete')
              @csrf
              <button class="badge bg-danger border-0" onclick="return confirm('Apa kamu yakin ingin menghapus eskul {{ $eskul->nama_eskul }}?')"><span data-feather="trash-2"></span></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    @else
        <h3 class="text-center mt-4">Tidak ada data Eskul</h3>
    @endif

  </div>

@endsection