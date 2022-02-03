<!-- ======= Header ======= -->
<header id="header" class="fixed-top">
  <div class="container-fluid d-flex justify-content-between align-items-center">

    <h1 class="logo me-auto me-lg-0"><a href="/">Ekstrakulikuler</a></h1>
    <!-- Uncomment below if you prefer to use an image logo -->
    {{-- <a href="index.html" class="logo"><img src="/assets/img/favicon.png" alt="" class="img-fluid"></a> --}}

    <nav id="navbar" class="navbar order-last order-lg-0">
      <ul>
        <li><a class="{{ Request::is('/') ? 'active' : '' }}" href="/">Home</a></li>
        <li><a class="{{ Request::is('about') ? 'active' : '' }}" href="/about">About</a></li>
        <li><a class="{{ Request::is('resume') ? 'active' : '' }}" href="/resume">Resume</a></li>
        <li><a class="{{ Request::is('services') ? 'active' : '' }}" href="/services">Services</a></li>
        <li><a class="{{ Request::is('portfolio') ? 'active' : '' }}" href="/portfolio">Portfolio</a></li>
        <li><a class="{{ Request::is('contact') ? 'active' : '' }}" href="/contact">Contact</a></li>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav><!-- .navbar -->

  </div>

</header><!-- End Header -->