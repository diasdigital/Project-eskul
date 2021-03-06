@extends('backend.layouts.main')

@section('konten')

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Daftar Petugas</h1>
  </div>

  <div class="table-responsive">
    <a href="/dashboard/petugas/create" class="btn btn-primary mb-3">Tambah Petugas Baru</a>
    
    @if (session()->has('berhasil'))
        <div class="alert alert-success" role="alert">
          {{ session('berhasil') }}
        </div>
    @endif

    @if ($tb_petugas->count())
    
    <table class="table table-striped">
      <thead class="table-dark">
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama Petugas</th>
          <th scope="col">Username</th>
          <th scope="col">Eskul</th>
          <th scope="col">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($tb_petugas as $petugas)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $petugas->nama_petugas }}</td>
          <td>{{ $petugas->username }}</td>
          @foreach ($tb_eskul as $eskul)
            @if ($eskul->id_eskul == $petugas->id_eskul)
                <td>{{ $eskul->nama_eskul }}</td>
            @endif
          @endforeach
          <td>
            <a href="/dashboard/petugas/{{ $petugas->id_akun }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
            <form action="/dashboard/petugas/{{ $petugas->id_akun }}" method="POST" class="d-inline">
              @method('delete')
              @csrf
              <button class="bange bg-danger border-0 text-white" onclick="return confirm('Apa kamu yakin ingin menghapus petugas {{ $petugas->nama_petugas }}?')"><span data-feather="trash-2"></span></button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    @else
        <h3 class="text-center mt-4">Tidak ada data petugas</h3>
    @endif

  </div>

@endsection