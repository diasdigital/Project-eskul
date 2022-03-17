@extends('backend.layouts.main')

@section('konten')

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Welcome back, {{ auth()->user()->nama_petugas }}</h1>
    <h5 class="btn btn-success active text-white fw-bold" style="cursor:default !important;">Status: {{ (auth()->user()->level == 'Admin') ? auth()->user()->level : '' }}</h5>
  </div>

  <div class="row row-cols-1 row-cols-md-2 g-4">

    @foreach ($dashboard as $cards)
      <div class="col-3">
        <div class="card bg-light pt-3">
          <img src="{{ url('/assets/img/'.$cards[1].'.svg') }}" height="100px">
          <div class="card-body">
            <h5 class="card-title text-center pb-2 fw-bold">{{ $cards[0] }}</h5>
            <table class="table bg-white table-bordered table-sm">
              @foreach ($cards[2] as $card)
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

  </div>

@endsection