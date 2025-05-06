<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - SDN 1 Wirasaba</title>

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        body {
            overflow-x: hidden;
        }
        .sidebar {
            min-height: 100vh;
            transition: all 0.3s;
        }
        .sidebar.collapsed {
            width: 80px;
        }
        .sidebar .nav-link {
            white-space: nowrap;
            overflow: hidden;
        }
        .sidebar.collapsed .nav-link span {
            display: none;
        }
        .content {
            transition: margin-left 0.3s;
        }
        @media (max-width: 768px) {
            .sidebar {
                position: absolute;
                z-index: 1000;
                background: #343a40;
            }
        }
    </style>
</head>
<body>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container-fluid">
            <button class="btn btn-primary me-2" id="sidebarToggle">
                ☰
            </button>
            <a class="navbar-brand" href="#">
                <img src="{{ asset('images/logo-sekolah.png') }}" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                SDN 1 Wirasaba
            </a>

            <div class="dropdown ms-auto">
                <a class="btn btn-primary dropdown-toggle" href="#" role="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    Profil
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                    <li><a class="dropdown-item" href="#">Detail Profil</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="dropdown-item">Logout</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Sidebar + Content -->
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="bg-dark text-white p-3 sidebar" id="sidebar">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('admin.dashboard') }}"><i class="bi bi-house"></i> <span>Dashboard</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('admin.profilsekolah.index') }}"><i class="bi bi-building"></i> <span>Profil Sekolah</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ route('admin.visimisi.index') }}"><i class="bi bi-bullseye"></i> <span>Visi Misi</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#"><i class="bi bi-diagram-3"></i> <span>Struktur Organisasi</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#"><i class="bi bi-people"></i> <span>Data Siswa</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#"><i class="bi bi-person-badge"></i> <span>Data Guru</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#"><i class="bi bi-trophy"></i> <span>Ekstrakurikuler</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#"><i class="bi bi-newspaper"></i> <span>Berita</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#"><i class="bi bi-images"></i> <span>Galeri</span></a>
                </li>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="p-4 content flex-grow-1">
            @yield('content')
        </div>
    </div>

    <!-- Bootstrap 5 JS + Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Sidebar Toggle Script -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const toggleBtn = document.getElementById('sidebarToggle');

        toggleBtn.addEventListener('click', () => {
            sidebar.classList.toggle('collapsed');
        });
    </script>
    @yield('scripts')

</body>
</html>
