@extends('backend.layouts.main')

@section('konten')

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar Jurusan</h1>
  </div>

  <div class="table-responsive">
    <a href="/dashboard/jurusan/create" class="btn btn-primary mb-3">Tambah Jurusan Baru</a>
    
    @if (session()->has('berhasil'))
        <div class="alert alert-success" role="alert">
          {{ session('berhasil') }}
        </div>
    @endif

    @if ($tb_jurusan->count())
    
    <table class="table table-striped">
      <thead class="table-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama Jurusan</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($tb_jurusan as $jurusan)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $jurusan->nama_jurusan }}</td>
          <td>
            <a href="/dashboard/jurusan/{{ $jurusan->id_jurusan }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    @else
        <h3 class="text-center mt-4">Tidak ada data jurusan</h3>
    @endif

  </div>

@endsection