@extends('frontend.layouts.main')

@section('frontend')

  <main id="main">

    <!-- ======= About Section ======= -->
    <section id="about" class="about">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>SMK PASIM PLUS</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row">
          <div class="col-lg-4">
            <img src="/assets/img/tentang.jpg" class="img-fluid">
          </div>
          <div class="col-lg-8 pt-4 pt-lg-0 content">
            <h3>Sekolah Menengah Kejuruan</h3>
            <p class="fst-italic mb-4">
              Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore
              magna aliqua.
            </p>
            <p>
              Officiis eligendi itaque labore et dolorum mollitia officiis optio vero. Quisquam sunt adipisci omnis et ut. Nulla accusantium dolor incidunt officia tempore. Et eius omnis.
              Cupiditate ut dicta maxime officiis quidem quia. Sed et consectetur qui quia repellendus itaque neque. Aliquid amet quidem ut quaerat cupiditate. Ab et eum qui repellendus omnis culpa magni laudantium dolores.
            </p>
            <p>
              Officiis eligendi itaque labore et dolorum mollitia officiis optio vero. Quisquam sunt adipisci omnis et ut. Nulla accusantium dolor incidunt officia tempore. Et eius omnis.
              Cupiditate ut dicta maxime officiis quidem quia. Sed et consectetur qui quia repellendus itaque neque. Aliquid amet quidem ut quaerat cupiditate. Ab et eum qui repellendus omnis culpa magni laudantium dolores.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Section -->

    <!-- ======= Facts Section ======= -->
    <section id="facts" class="facts">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Data Ekstrakulikuler</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <div class="row counters">

          <div class="col-lg-4 col-4 text-center">
            <span data-purecounter-start="0" data-purecounter-end="{{ $tb_eskul }}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Ekstrakulikuler</p>
          </div>

          <div class="col-lg-4 col-4 text-center">
            <span data-purecounter-start="0" data-purecounter-end="{{ $tb_anggota }}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Anggota Aktif</p>
          </div>

          <div class="col-lg-4 col-4 text-center">
            <span data-purecounter-start="0" data-purecounter-end="{{ $tb_prestasi }}" data-purecounter-duration="1" class="purecounter"></span>
            <p>Prestasi</p>
          </div>

        </div>

      </div>
    </section><!-- End Facts Section -->

  </main><!-- End #main -->

@endsection