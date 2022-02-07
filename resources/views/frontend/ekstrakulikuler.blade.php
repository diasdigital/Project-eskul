@extends('frontend.layouts.main')

@section('frontend')

  <main id="main">

    <!-- ======= Services Section ======= -->
    <section id="services" class="services">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Ekstrakulikuler</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
          @foreach ($tb_eskul as $eskul)
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch justify-content-around my-3" data-aos="zoom-in" data-aos-delay="100">
              <div class="icon-box iconbox-blue">
                <img src="{{ asset('storage/' . $eskul->foto) }}" class="img-fluid px-4" width="300px" height="300px">
                <h4><a href="">{{ $eskul->nama_eskul }}</a></h4>
              </div>
            </div>
          @endforeach
        </div>

      </div>
    </section><!-- End Services Section -->

  </main><!-- End #main -->

@endsection