<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <span data-feather="home"></span>
            Dashboard
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/jurusan*') ? 'active' : '' }}" href="/dashboard/jurusan">
            <span data-feather="book-open"></span>
            Jurusan
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/eskul*') ? 'active' : '' }}" href="/dashboard/eskul">
            <span data-feather="dribbble"></span>
            Ekstrakulikuler
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/anggota*') ? 'active' : '' }}" href="/dashboard/anggota">
            <span data-feather="users"></span>
            Anggota
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/kegiatan*') ? 'active' : '' }}" href="/dashboard/kegiatan">
            <span data-feather="calendar"></span>
            Kegiatan
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard/prestasi*') ? 'active' : '' }}" href="/dashboard/prestasi">
            <span data-feather="star"></span>
            Prestasi
          </a>
        </li>
      </div>
</nav>