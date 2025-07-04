<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - SDN 1 Wirasaba</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Summernote CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.css" rel="stylesheet">

    <style>
        body {
            overflow-x: hidden;
        }

        .sidebar {
            min-height: 100vh;
            background-color: rgb(0, 10, 116);
            color: white;
            transition: all 0.3s;
        }

        #sidebarToggle {
            color: white;
            font-size: 24px;
            border: none;
        }

        .sidebar .nav-link {
            color: white;
            white-space: nowrap;
        }

        .sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }

        .content {
            transition: margin-left 0.3s;
        }

        /* Mobile behavior */
        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                top: 0;
                bottom: 0;
                left: -250px;
                width: 250px;
                z-index: 1000;
            }

            .sidebar.active {
                left: 0;
            }

            #sidebarOverlay {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background-color: rgba(0, 0, 0, 0.3);
                z-index: 999;
            }
        }
    </style>
</head>

<body>
<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:rgb(0, 10, 116);">
    <div class="container-fluid">
        <button class="btn me-2" id="sidebarToggle">☰</button>
        <a class="navbar-brand" href="#">
            <img src="{{ $profilSekolah && $profilSekolah->logo ? asset('storage/' . $profilSekolah->logo) : asset('default/logo.png') }}"
                 alt="Logo" width="30" height="30">
            SDN 1 Wirasaba
        </a>
        <div class="ms-auto">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
    </div>
</nav>

<!-- Overlay -->
<div id="sidebarOverlay"></div>

<!-- Layout -->
<div class="d-flex">
    <!-- Sidebar -->
    <div class="sidebar text-white p-3" id="sidebar">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('admin.dashboard') }}">
                    <i class="bi bi-speedometer2"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('admin.profilsekolah.index') }}">
                    <i class="bi bi-info-circle"></i> <span>Profil Sekolah</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('admin.visimisi.index') }}">
                    <i class="bi bi-bullseye"></i> <span>Visi Misi</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('admin.strukturorganisasi.index') }}">
                    <i class="bi bi-diagram-3-fill"></i> <span>Struktur Organisasi</span>
                </a>
            </li>

            <!-- Data Guru dan Siswa -->
            <li class="nav-item">
                <a class="nav-link text-white" data-bs-toggle="collapse" href="#submenuGuru" role="button">
                    <i class="bi bi-people-fill"></i> <span>Data Guru dan Siswa</span>
                </a>
                <div class="collapse" id="submenuGuru">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('admin.siswaguru.create') }}">
                                <i class="bi bi-plus-circle"></i> Tambah Data
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-white" href="{{ route('admin.siswaguru.index') }}">
                                <i class="bi bi-list-ul"></i> Data Guru & Siswa
                            </a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Prestasi -->
            <li class="nav-item">
                <a class="nav-link text-white" data-bs-toggle="collapse" href="#submenuprestasi">
                    <i class="bi bi-award-fill"></i> <span>Prestasi</span>
                </a>
                <div class="collapse" id="submenuprestasi">
                    <ul class="nav flex-column ms-3">
                        <li><a class="nav-link text-white" href="{{ route('admin.prestasi.create') }}"><i class="bi bi-plus-circle"></i> Tambah Data</a></li>
                        <li><a class="nav-link text-white" href="{{ route('admin.prestasi.index') }}"><i class="bi bi-list-check"></i> Daftar Prestasi</a></li>
                    </ul>
                </div>
            </li>

            <!-- Ekskul -->
            <li class="nav-item">
                <a class="nav-link text-white" data-bs-toggle="collapse" href="#submenuEkskul">
                    <i class="bi bi-puzzle"></i> <span>Ekstrakurikuler</span>
                </a>
                <div class="collapse" id="submenuEkskul">
                    <ul class="nav flex-column ms-3">
                        <li><a class="nav-link text-white" href="{{ route('admin.ekstrakurikuler.create') }}"><i class="bi bi-plus-circle"></i> Tambah Data</a></li>
                        <li><a class="nav-link text-white" href="{{ route('admin.ekstrakurikuler.index') }}"><i class="bi bi-list-task"></i> Daftar Ekskul</a></li>
                    </ul>
                </div>
            </li>

            <!-- Sarpras -->
            <li class="nav-item">
                <a class="nav-link text-white" data-bs-toggle="collapse" href="#submenuSarana">
                    <i class="bi bi-building"></i> <span>Sarana Prasarana</span>
                </a>
                <div class="collapse" id="submenuSarana">
                    <ul class="nav flex-column ms-3">
                        <li><a class="nav-link text-white" href="{{ route('admin.saranaprasarana.create') }}"><i class="bi bi-plus-circle"></i> Tambah Data</a></li>
                        <li><a class="nav-link text-white" href="{{ route('admin.saranaprasarana.index') }}"><i class="bi bi-list-columns"></i> Daftar Sarana</a></li>
                    </ul>
                </div>
            </li>

            <!-- Berita -->
            <li class="nav-item">
                <a class="nav-link text-white" data-bs-toggle="collapse" href="#submenuBerita">
                    <i class="bi bi-megaphone"></i> <span>Berita</span>
                </a>
                <div class="collapse" id="submenuBerita">
                    <ul class="nav flex-column ms-3">
                        <li><a class="nav-link text-white" href="{{ route('admin.berita.create') }}"><i class="bi bi-plus-circle"></i> Tambah Data</a></li>
                        <li><a class="nav-link text-white" href="{{ route('admin.berita.index') }}"><i class="bi bi-journal-text"></i> Daftar Berita</a></li>
                    </ul>
                </div>
            </li>

            <!-- Galeri -->
            <li class="nav-item">
                <a class="nav-link text-white" data-bs-toggle="collapse" href="#submenuGaleri">
                    <i class="bi bi-images"></i> <span>Galeri Kegiatan</span>
                </a>
                <div class="collapse" id="submenuGaleri">
                    <ul class="nav flex-column ms-3">
                        <li><a class="nav-link text-white" href="{{ route('admin.galeri.create') }}"><i class="bi bi-plus-circle"></i> Tambah Data</a></li>
                        <li><a class="nav-link text-white" href="{{ route('admin.galeri.index') }}"><i class="bi bi-collection"></i> Daftar Galeri</a></li>
                    </ul>
                </div>
            </li>

            <!-- Pustaka -->
            <li class="nav-item">
                <a class="nav-link text-white" data-bs-toggle="collapse" href="#submenuPustaka">
                    <i class="bi bi-journals"></i> <span>Galeri Pustaka</span>
                </a>
                <div class="collapse" id="submenuPustaka">
                    <ul class="nav flex-column ms-3">
                        <li><a class="nav-link text-white" href="{{ route('admin.galeripustaka.create') }}"><i class="bi bi-plus-circle"></i> Tambah Data</a></li>
                        <li><a class="nav-link text-white" href="{{ route('admin.galeripustaka.index') }}"><i class="bi bi-book-half"></i> Daftar Pustaka</a></li>
                    </ul>
                </div>
            </li>

            <!-- Kontak -->
            <li class="nav-item">
                <a class="nav-link text-white" data-bs-toggle="collapse" href="#submenuKontak">
                    <i class="bi bi-telephone-fill"></i> <span>Kontak</span>
                </a>
                <div class="collapse" id="submenuKontak">
                    <ul class="nav flex-column ms-3">
                        <li><a class="nav-link text-white" href="{{ route('admin.contact.create') }}"><i class="bi bi-plus-circle"></i> Tambah Data</a></li>
                        <li><a class="nav-link text-white" href="{{ route('admin.contact.index') }}"><i class="bi bi-card-list"></i> Data Kontak</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>

    <!-- Content -->
    <div class="p-4 content flex-grow-1">
        @yield('content')
    </div>
</div>

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('sidebarOverlay');
    const toggleBtn = document.getElementById('sidebarToggle');

    toggleBtn.addEventListener('click', () => {
        sidebar.classList.toggle('active');
        overlay.style.display = sidebar.classList.contains('active') ? 'block' : 'none';
    });

    overlay.addEventListener('click', () => {
        sidebar.classList.remove('active');
        overlay.style.display = 'none';
    });
</script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js"></script>
@stack('scripts')

</body>
</html>
