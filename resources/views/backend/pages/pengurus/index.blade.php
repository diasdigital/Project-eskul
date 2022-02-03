@extends('backend.layouts.main')

@section('konten')

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    @if (auth()->user()->id_eskul)
        <h1 class="h2">Daftar Pengurus Ekstrakulikuler {{ $tb_eskul->find(auth()->user()->id_eskul)->nama_eskul }}</h1>
    @else
      <h1 class="h2">Daftar Semua Pengurus</h1>
    @endif
  </div>
    
    @if (session()->has('berhasil'))
        <div class="alert alert-success" role="alert">
          {{ session('berhasil') }}
        </div>
    @endif

    @if (auth()->user()->id_eskul)
        <div class="row">
          <div class="col-lg-5">
            <div class="card h-100">
              <div class="card-body">
                <table class="table table-bordered">
                  <tr class="table-primary">
                    <th>Pembina Ekstrakulikuler</th>
                    @foreach ($tb_pengurus as $pengurus)
                        @if ($pengurus->id_pengurus == auth()->user()->id_eskul)
                            <td>{{ $pengurus->nama_pembina }}</td>
                        @endif
                    @endforeach
                  </tr>
                </tr>
                <tr class="table-light">
                  <th>Ketua</th>
                    @foreach ($tb_pengurus as $pengurus)
                      @if ($pengurus->id_pengurus == auth()->user()->id_eskul)
                        @foreach ($tb_anggota as $anggota)
                          @if ($anggota->id_anggota == $pengurus->id_ketua)
                            <td>{{ $anggota->nama_anggota }}</td>
                          @endif
                        @endforeach
                      @endif
                    @endforeach
                </tr>
                <tr class="table-light">
                  <th>Wakil Ketua</th>
                    @foreach ($tb_pengurus as $pengurus)
                      @if ($pengurus->id_pengurus == auth()->user()->id_eskul)
                        @foreach ($tb_anggota as $anggota)
                          @if ($anggota->id_anggota == $pengurus->id_wakil)
                            <td>{{ $anggota->nama_anggota }}</td>
                          @endif
                        @endforeach
                      @endif
                    @endforeach
                </tr>
                <tr class="table-light">
                  <th>Sekretaris</th>
                    @foreach ($tb_pengurus as $pengurus)
                      @if ($pengurus->id_pengurus == auth()->user()->id_eskul)
                        @foreach ($tb_anggota as $anggota)
                          @if ($anggota->id_anggota == $pengurus->id_sekretaris)
                            <td>{{ $anggota->nama_anggota }}</td>
                          @endif
                        @endforeach
                      @endif
                    @endforeach
                </tr>
                <tr class="table-light">
                  <th>Bendahara</th>
                    @foreach ($tb_pengurus as $pengurus)
                      @if ($pengurus->id_pengurus == auth()->user()->id_eskul)
                        @foreach ($tb_anggota as $anggota)
                          @if ($anggota->id_anggota == $pengurus->id_bendahara)
                            <td>{{ $anggota->nama_anggota }}</td>
                          @endif
                        @endforeach
                      @endif
                    @endforeach
                </tr>
                </table>
            <a href="/dashboard/pengurus/{{ auth()->user()->id_eskul }}/edit" class="badge bg-info d-block fs-6 text-decoration-none mx-5"><span class="me-2">Ubah kepengurusan</span><span data-feather="edit"></span></a>
              </div>
            </div>
          </div>
        </div>
    @else

  <div class="row">
    @foreach ($tb_eskul as $eskul)
      <div class="col-lg-5 m-3">
        <div class="card h-100">
          <div class="card-body">
              <h4>{{ $eskul->nama_eskul }}</h4>
            
              <table class="table table-bordered">
                <tr class="table-primary">
                  <th>Pembina Ekstrakulikuler</th>
                  @foreach ($tb_pengurus as $pengurus)
                      @if ($pengurus->id_pengurus == $eskul->id_eskul)
                          <td>{{ $pengurus->nama_pembina }}</td>
                      @endif
                  @endforeach
                </tr>
                <tr class="table-light">
                  <th>Ketua</th>
                    @foreach ($tb_pengurus as $pengurus)
                      @if ($pengurus->id_pengurus == $eskul->id_eskul)
                        @foreach ($tb_anggota as $anggota)
                          @if ($anggota->id_anggota == $pengurus->id_ketua)
                            <td>{{ $anggota->nama_anggota }}</td>
                          @endif
                        @endforeach
                      @endif
                    @endforeach
                </tr>
                <tr class="table-light">
                  <th>Wakil Ketua</th>
                    @foreach ($tb_pengurus as $pengurus)
                      @if ($pengurus->id_pengurus == $eskul->id_eskul)
                        @foreach ($tb_anggota as $anggota)
                          @if ($anggota->id_anggota == $pengurus->id_wakil)
                            <td>{{ $anggota->nama_anggota }}</td>
                          @endif
                        @endforeach
                      @endif
                    @endforeach
                </tr>
                <tr class="table-light">
                  <th>Sekretaris</th>
                    @foreach ($tb_pengurus as $pengurus)
                      @if ($pengurus->id_pengurus == $eskul->id_eskul)
                        @foreach ($tb_anggota as $anggota)
                          @if ($anggota->id_anggota == $pengurus->id_sekretaris)
                            <td>{{ $anggota->nama_anggota }}</td>
                          @endif
                        @endforeach
                      @endif
                    @endforeach
                </tr>
                <tr class="table-light">
                  <th>Bendahara</th>
                    @foreach ($tb_pengurus as $pengurus)
                      @if ($pengurus->id_pengurus == $eskul->id_eskul)
                        @foreach ($tb_anggota as $anggota)
                          @if ($anggota->id_anggota == $pengurus->id_bendahara)
                            <td>{{ $anggota->nama_anggota }}</td>
                          @endif
                        @endforeach
                      @endif
                    @endforeach
                </tr>
              </table>
            <a href="/dashboard/pengurus/{{ $eskul->id_eskul }}/edit" class="badge bg-info d-block fs-6 text-decoration-none mx-5"><span class="me-2">Ubah kepengurusan</span><span data-feather="edit"></span></a>
          </div>
        </div>
      </div>
    @endforeach
  </div>
    
  @endif

@endsection