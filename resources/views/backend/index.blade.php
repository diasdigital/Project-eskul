@extends('backend.layouts.main')

@section('konten')

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Welcome back, {{ auth()->user()->nama_petugas }}</h1>
    <h5 class="btn btn-success active text-white fw-bold" style="cursor:default !important;">Status: {{ (auth()->user()->level == 'Admin') ? auth()->user()->level : '' }}</h5>
  </div>

  <div class="row row-cols-1 row-cols-md-2 g-4">

    <div class="col-3">
      <div class="card bg-light pt-3">
        <img src="{{ url('/assets/img/users.svg') }}" height="100px">
        <div class="card-body">
          <h5 class="card-title text-center pb-2 fw-bold">Jumlah Anggota</h5>
          <table class="table bg-white table-bordered table-sm">
            @foreach ($data_anggota as $anggota)
              @if (isset($anggota['nama_eskul']))
                <tr>
                  <td>{{ $anggota['nama_eskul'] }}</td>
                  <td class="text-center">{{ $anggota['jumlah'] }}</td>
                </tr>
              @else
                <tr>
                  <td class="fw-bold">Total</td>
                  <td class="fw-bold text-center">{{ $anggota['total'] }}</td>
                </tr>
              @endif
            @endforeach
          </table>
          <p class="card-text"></p>
        </div>
      </div>
    </div>

    <div class="col-3">
      <div class="card bg-light pt-3">
        <img src="{{ url('/assets/img/calendar.svg') }}" height="100px">
        <div class="card-body">
          <h5 class="card-title text-center pb-2 fw-bold">Jumlah Kegiatan</h5>
          <table class="table bg-white table-bordered table-sm">
            @foreach ($data_kegiatan as $kegiatan)
              @if (isset($kegiatan['nama_eskul']))
                <tr>
                  <td>{{ $kegiatan['nama_eskul'] }}</td>
                  <td class="text-center">{{ $kegiatan['jumlah'] }}</td>
                </tr>
              @else
                <tr>
                  <td class="fw-bold">Total</td>
                  <td class="fw-bold text-center">{{ $kegiatan['total'] }}</td>
                </tr>
              @endif
            @endforeach
          </table>
          <p class="card-text"></p>
        </div>
      </div>
    </div>

    <div class="col-3">
      <div class="card bg-light pt-3">
        <img src="{{ url('/assets/img/star.svg') }}" height="100px">
        <div class="card-body">
          <h5 class="card-title text-center pb-2 fw-bold">Jumlah Prestasi</h5>
          <table class="table bg-white table-bordered table-sm">
            @foreach ($data_prestasi as $prestasi)
              @if (isset($prestasi['nama_eskul']))
                <tr>
                  <td>{{ $prestasi['nama_eskul'] }}</td>
                  <td class="text-center">{{ $prestasi['jumlah'] }}</td>
                </tr>
              @else
                <tr>
                  <td class="fw-bold">Total</td>
                  <td class="fw-bold text-center">{{ $prestasi['total'] }}</td>
                </tr>
              @endif
            @endforeach
          </table>
          <p class="card-text"></p>
        </div>
      </div>
    </div>

  </div>

@endsection