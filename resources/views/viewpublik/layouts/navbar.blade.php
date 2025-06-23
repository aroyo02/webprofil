<style>
    
    /* Dropdown background transparan */
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
    <nav id="navbar" class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container">

            <!-- Logo + Nama Sekolah -->
            <a class="navbar-brand d-flex align-items-center fw-bold" href="{{ route('dashboardpublik') }}">
                <img src="{{ asset('gambar/logoamikom.png') }}" alt="Logo Sekolah" width="40" height="40" class="me-2">
                SDN 1 Wirasaba
            </a>

            <!-- Toggle untuk Mobile -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu Navigasi -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link active" href="{{ route('dashboardpublik') }}">Dashboard</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="profilDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Profil</a>
                        <ul class="dropdown-menu" aria-labelledby="profilDropdown">
                             <li><a class="dropdown-item" href="{{ route('profilsekolah') }}">Profil Sekolah</a></li>
                             <li><a class="dropdown-item" href="{{ route('visimisi') }}">Visi Misi</a></li>
                             <li><a class="dropdown-item" href="{{ route('strukturorganisasi') }}">Struktur Organisasi</a></li>
                             <li><a class="dropdown-item" href="#">Daftar Guru</a></li>
                        </ul>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="infoDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Informasi</a>
                        <ul class="dropdown-menu" aria-labelledby="infoDropdown">
                            <li><a class="dropdown-item" href="#">Ekstrakurikuler</a></li>
                            <li><a class="dropdown-item" href="#">Sarpras</a></li>
                        </ul>
                    </li>

                    <li class="nav-item"><a class="nav-link" href="#">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Berita</a></li>
                </ul>
            </div>
        </div>
    </nav>



