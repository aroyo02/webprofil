<style>
    .dropdown-menu {
        background-color: rgba(255, 255, 255, 0.34) !important;
        border: 4px solid rgb(255, 255, 255);
        backdrop-filter: blur(10px);
    }

    .dropdown-menu .dropdown-item {
        color: black;
    }

    .dropdown-menu .dropdown-item:hover {
        background-color: rgb(255, 255, 255);
    }
</style>

<!-- Navbar -->
<nav id="navbar" class="navbar navbar-expand-lg navbar-light bg-white shadow-sm fixed-top" style="top: 0; transition: top 0.3s;">
    <div class="container">
        <!-- Logo + Nama Sekolah -->
        <a class="navbar-brand d-flex align-items-center fw-bold" href="{{ route('dashboardpublik') }}">
            <img src="{{ $profil && $profil->logo ? asset('storage/' . $profil->logo) : asset('gambar/logo.png') }}" alt="Logo Sekolah" width="40" height="40" class="me-2">
            SDN 1 Wirasaba
        </a>

        <!-- Toggle untuk Mobile -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu Navigasi -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <!-- Dashboard -->
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active fw-bold' : '' }}" href="{{ route('dashboardpublik') }}">Beranda</a>
                </li>

                <!-- Dropdown Profil -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ Request::is('profilsekolah') || Request::is('visimisi') || Request::is('struktur-organisasi') || Request::is('daftarguru') || Request::is('saranaprasarana') ? 'active fw-bold' : '' }}"
                       id="profilDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Profil
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="profilDropdown">
                        <li><a class="dropdown-item {{ Request::is('profilsekolah') ? 'fw-bold text-primary' : '' }}" href="{{ route('profilsekolah') }}">Profil Sekolah</a></li>
                        <li><a class="dropdown-item {{ Request::is('visimisi') ? 'fw-bold text-primary' : '' }}" href="{{ route('visimisi') }}">Visi Misi</a></li>
                        <li><a class="dropdown-item {{ Request::is('struktur-organisasi') ? 'fw-bold text-primary' : '' }}" href="{{ route('strukturorganisasi') }}">Struktur Organisasi</a></li>
                        <li><a class="dropdown-item {{ Request::is('daftarguru') ? 'fw-bold text-primary' : '' }}" href="{{ route('daftarguru') }}">Daftar Guru</a></li>
                        <li><a class="dropdown-item {{ Request::is('saranaprasarana') ? 'fw-bold text-primary' : '' }}" href="{{ route('sarpras') }}">Sarana Prasarana</a></li>
                    </ul>
                </li>

                <!-- Dropdown kesiswaan -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ Request::is('ekstrakurikuler') || Request::is('prestasi') ? 'active fw-bold' : '' }}"
                       href="#" id="kesiswaanDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Kesiswaan
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="kesiswaanDropdown">
                        <li><a class="dropdown-item {{ Request::is('ekstrakurikuler') ? 'fw-bold text-primary' : '' }}" href="{{ route('ekskul') }}">Ekstrakurikuler</a></li>
                        <li><a class="dropdown-item {{ Request::is('prestasi') ? 'fw-bold text-primary' : '' }}" href="{{ route('prestasi') }}">Prestasi</a></li>
                    </ul>
                </li>

                <!-- Galeri -->
                 <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle {{ Request::is('galeri') || Request::is('galeripustaka') ? 'active fw-bold' : '' }}"
                       href="#" id="galeriDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Galeri
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="galeriDropdown">
                        <li><a class="dropdown-item {{ Request::is('galeri') ? 'fw-bold text-primary' : '' }}" href="{{ route('galeri') }}">Galeri Kegiatan</a></li>
                        <li><a class="dropdown-item {{ Request::is('galeripustaka') ? 'fw-bold text-primary' : '' }}" href="{{ route('galeripustakapublik') }}">Galeri Pustaka</a></li>
                    </ul>
                </li>

                <!-- Berita -->
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('berita*') ? 'active fw-bold' : '' }}" href="{{ route('berita.publik') }}">Berita</a>
                </li>

                <!-- Kontak -->
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('kontak*') ? 'active fw-bold' : '' }}" href="{{ route('kontak.publik') }}">Kontak</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Script Scroll Navbar -->
<script>
    let prevScrollPos = window.pageYOffset;
    const navbar = document.getElementById("navbar");

    window.addEventListener("scroll", function () {
        const currentScrollPos = window.pageYOffset;

        if (prevScrollPos > currentScrollPos) {
            navbar.style.top = "0";
        } else {
            navbar.style.top = "-80px";
        }

        prevScrollPos = currentScrollPos;
    });
</script>
