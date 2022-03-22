<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
  <div class="container-fluid d-flex justify-content-between align-items-center">

    <h1 class="logo me-auto me-lg-0"><a href="/">SMK PASIM</a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    {{-- <a href="index.html" class="logo"><img src="/assets/img/favicon.png" alt="" class="img-fluid"></a> --}}

    <nav id="navbar" class="navbar order-last order-lg-0 me-lg-5">
      <ul>
        <li><a class="{{ Request::is('/') ? 'active' : '' }}" href="/">Beranda</a></li>
        <li><a class="{{ Request::is('ekstrakulikuler*') ? 'active' : '' }}" href="/ekstrakulikuler">Ekstrakulikuler</a></li>
        <li><a class="{{ Request::is('prestasi') ? 'active' : '' }}" href="/prestasi">Prestasi</a></li>
        <li><a class="{{ Request::is('kegiatan') ? 'active' : '' }}" href="/kegiatan">Kegiatan</a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

  </div>

</header><!-- End Header -->