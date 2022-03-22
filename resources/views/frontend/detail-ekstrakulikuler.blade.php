@extends('frontend.layouts.main')

@section('frontend')

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>{{ $eskul->nama_eskul }}</h2>
        </div>

        <div class="row">
          <div class="col-lg-4">
            <img src="{{ asset('storage/' . $eskul->foto) }}" class="img-fluid">
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content">
            {!! $eskul->deskripsi !!}
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Facts Section ======= -->
    <section id="facts" class="facts">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2></h2>
          <p>Berikut merupakan nama pembina, jumlah anggota, serta jumlah prestasi dari eskul {{ $eskul->nama_eskul }}</p>
        </div>

        <div class="row counters">

          <div class="col-lg-4 col-4 text-center">
            <span class="">{{ $nama_pembina }}</span>
            <p>Pembina</p>
          </div>

          <div class="col-lg-4 col-4 text-center">
            <span data-purecounter-start="0" data-purecounter-end="{{ $anggota }}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Anggota Aktif</p>
          </div>

          <div class="col-lg-4 col-4 text-center">
            <span data-purecounter-start="0" data-purecounter-end="{{ $prestasi }}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Prestasi</p>
          </div>

        </div>

      </div>
    </section><!-- End Facts Section -->

    <section id=facts class="facts">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Kegiatan</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Temporibus laudantium doloremque dolor numquam, vitae consequatur veritatis doloribus. Praesentium, repellat repellendus!</p>
        </div>

        <div class="accordion" id="kegiatan">

          @foreach ($tb_kegiatan as $kegiatan)
          <div class="accordion-item">
            <h2 class="accordion-header" id={{ $kegiatan->id_kegiatan }}>
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#kegiatan{{ $kegiatan->id_kegiatan }}">
                {{ $kegiatan->tanggal_pelaksanaan }} : {{ $kegiatan->nama_kegiatan }}
              </button>
            </h2>
            <div id="kegiatan{{ $kegiatan->id_kegiatan }}" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#kegiatan">
              <div class="accordion-body">
                <strong class="d-block">Tempat: {{ $kegiatan->tempat }}</strong>
                {{ $kegiatan->deskripsi }}
              </div>
            </div>
          </div>
          @endforeach

        </div>

      </div>
    </section>

  </main><!-- End #main -->

@endsection