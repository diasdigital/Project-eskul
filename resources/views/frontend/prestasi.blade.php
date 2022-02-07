@extends('frontend.layouts.main')

@section('frontend')

  <main id="main">

    <!-- ======= Portfolio Section ======= -->
    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Prestasi</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">Semua</li>
              @foreach ($data_eskul as $eskul)
                <li data-filter=".filter-{{ $eskul[0] }}">{{ $eskul[1] }}</li>
              @endforeach
            </ul>
          </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

          @foreach ($tb_prestasi as $prestasi)
            <div class="col-lg-4 col-md-6 portfolio-item filter-{{ strtok(strtolower($prestasi->nama_eskul), " ") }}">
              <div class="portfolio-wrap">
                <img src="{{ asset('storage/' . $prestasi->bukti_foto) }}" class="img-fluid" width="100%" alt="">
                <div class="portfolio-info">
                  <h4>{{ $prestasi->nama_prestasi }}</h4>
                  <p>{{ $prestasi->nama_eskul }}</p>
                  <div class="portfolio-links">
                    <a href="{{ asset('storage/' . $prestasi->bukti_foto) }}" data-gallery="portfolioGallery" class="portfolio-lightbox" title="{{ $prestasi->nama_prestasi }}"><i class="bx bx-image"></i></a>
                    <a href="/detail-prestasi/{{ $prestasi->id_prestasi }}" class="portfolio-details-lightbox" data-glightbox="type: external" title="Portfolio Details"><i class="bx bxs-detail"></i></a>
                  </div>
                </div>
              </div>
            </div>
          @endforeach

        </div>

      </div>
    </section><!-- End Portfolio Section -->

  </main><!-- End #main -->

@endsection