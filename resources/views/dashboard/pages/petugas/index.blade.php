@extends('dashboard.layouts.main')

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

    @if ($petugas->count())
    
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
        @foreach ($petugas as $pet)
        <tr>
          <td>{{ $loop->iteration }}</td>
          <td>{{ $pet->nama_petugas }}</td>
          <td>{{ $pet->username }}</td>
          @foreach ($eskul as $eks)
            @if ($eks->id_eskul == $pet->id_eskul)
                <td>{{ $eks->nama_eskul }}</td>
            @endif
          @endforeach
          <td>
            <a href="/dashboard/petugas/{{ $pet->id_akun }}/edit" class="badge bg-warning"><span data-feather="edit"></span></a>
            <form action="/dashboard/petugas/{{ $pet->id_akun }}" method="POST" class="d-inline">
              @method('delete')
              @csrf
              <button class="bange bg-danger border-0 text-white" onclick="return confirm('Apa kamu yakin ingin menghapus petugas {{ $pet->nama_petugas }}?')"><span data-feather="trash-2"></span></button>
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