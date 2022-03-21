@extends('backend.layouts.main')

@section('konten')

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Welcome back, {{ auth()->user()->nama_petugas }}</h1>
    @can('admin')<h5 class="btn btn-success active text-white fw-bold" style="cursor:default !important;">Status: {{ (auth()->user()->level == 'Admin') ? auth()->user()->level : '' }}</h5>@endcan
  </div>

  <div class="row row-cols-1 row-cols-md-2 g-4">

    @if(auth()->user()->level == 'Admin')
    {{-- Statistik Ekstrakulikuler --}}
      @foreach ($statistik_eskul as $cards)
      <div class="col-3">
        <div class="card bg-light pt-3">
          <img src="{{ url('/assets/img/feathericons/'.$cards['icon'].'.svg') }}" height="100px">
          <div class="card-body">
            <h5 class="card-title text-center pb-2 fw-bold">{{ $cards['nama_card'] }}</h5>
            <table class="table bg-white table-bordered table-sm">
              @foreach ($cards['data_card'] as $card)
                @if (isset($card['nama_eskul']))
                  <tr>
                    <td>{{ $card['nama_eskul'] }}</td>
                    <td class="text-center">{{ $card['jumlah'] }}</td>
                  </tr>
                @else
                  <tr>
                    <td class="fw-bold">Total</td>
                    <td class="fw-bold text-center">{{ $card['total'] }}</td>
                  </tr>
                @endif
              @endforeach
            </table>
            <p class="card-text"></p>
          </div>
        </div>
      </div>
      @endforeach
      
      {{-- Data yang tampil hanya untuk admin --}}
      <div class="col-3">
        <div class="card bg-light">
          <div class="card-body">
            @foreach ($data_untuk_admin as $card)
            <div class="card mb-3" style="max-width: 540px;">
              <div class="row g-0">
                <div class="col-md-4">
                  <img src="{{ url('/assets/img/feathericons/'.$card['icon'].'.svg') }}" class="img-fluid p-2">
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <p class="card-text m-0">{{ $card['nama_card'] }}</p>
                    <h5 class="card-title">{{ $card['data_card'] }}</h5>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    @else
        
    @endif

  </div>

@endsection