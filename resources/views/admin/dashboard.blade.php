@extends('admin.layout.navbar')

@section('content')
<h1 class="mb-4">Dashboard Admin SDN 1 Wirasaba</h1>
<p>Selamat datang di Dashboard Admin! Kelola data sekolah dengan mudah di sini.</p>

<!-- Ringkasan -->
<div class="row">
    <div class="col-md-3 mb-3">
        <div class="card text-white" style="background-color: rgb(31, 50, 255);">
            <div class="card-body">
                <h5 class="card-title">Total Siswa</h5>
                <p class="card-text fs-3 count-up" data-target="{{ $jumlahSiswa }}">0</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card text-white" style="background-color: rgb(31, 50, 255);">
            <div class="card-body">
                <h5 class="card-title">Total Guru</h5>
                <p class="card-text fs-3 count-up" data-target="{{ $jumlahGuru }}">0</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card text-white" style="background-color: rgb(31, 50, 255);">
            <div class="card-body">
                <h5 class="card-title">Total Ekstrakurikuler</h5>
                <p class="card-text fs-3 count-up" data-target="{{ $jumlahEkstrakurikuler }}">0</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card text-white" style="background-color: rgb(31, 50, 255);">
            <div class="card-body">
                <h5 class="card-title">Total Sarana Prasarana</h5>
                <p class="card-text fs-3 count-up" data-target="{{ $jumlahSarana }}">0</p>
            </div>
        </div>
    </div>
</div>

<!-- Motto, Profil Sekolah, dan Sambutan -->
<div class="card mb-4 position-relative">
    <div class="card-body">
        <!-- Dropdown Motto -->
        <div class="dropdown position-absolute end-0 top-0 mt-2 me-3">
            <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="dropdown">
                <i class="bi bi-three-dots-vertical"></i>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
                @if($profilSekolah && $profilSekolah->motto)
                    <li><a class="dropdown-item" href="{{ route('admin.profilsekolah.index') }}#edit-motto">Edit</a></li>
                    <li>
                        <form action="{{ route('admin.profilsekolah.destroy') }}" method="POST" onsubmit="return confirm('Hapus motto?')">
                            @csrf @method('DELETE')
                            <input type="hidden" name="type" value="motto">
                            <button class="dropdown-item text-danger">Hapus</button>
                        </form>
                    </li>
                @endif
            </ul>
        </div>

        <!-- Motto -->
        <p><strong>Motto:</strong> <em>"{{ $profilSekolah->motto ?? 'Belum ada motto ditambahkan.' }}"</em></p>
        @if(!$profilSekolah || !$profilSekolah->motto)
            <a href="{{ route('admin.profilsekolah.index') }}#edit-motto" class="btn btn-sm btn-success mb-2">Tambah Data</a>
        @endif

        <hr>

        <!-- Profil Sekolah -->
        @if($profilSekolah && ($profilSekolah->foto_profil || $profilSekolah->content))
        <div class="position-relative mb-3">
            <!-- Dropdown Profil Sekolah -->
            <div class="dropdown position-absolute top-0 end-0 mt-2 me-0">
                <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="dropdown">
                    <i class="bi bi-three-dots-vertical"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="{{ route('admin.profilsekolah.index') }}#edit-content">Edit</a></li>
                    <li>
                        <form action="{{ route('admin.profilsekolah.destroy') }}" method="POST">
                            @csrf @method('DELETE')
                            <input type="hidden" name="type" value="content">
                            <button class="dropdown-item text-danger" onclick="return confirm('Hapus konten profil sekolah?')">Hapus</button>
                        </form>
                    </li>
                </ul>
            </div>

            <div class="row g-3 align-items-center mt-2">
                @if($profilSekolah->foto_profil)
                <div class="col-md-3 text-center">
                    <img src="{{ asset('storage/' . $profilSekolah->foto_profil) }}" class="img-fluid rounded" style="max-height: 120px;" alt="Foto Profil">
                </div>
                @endif

                <div class="col-md-9">
                    <h5 class="card-title">Profil Sekolah</h5>
                    <div class="card-text">
                        {!! $profilSekolah->content !!}
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="alert alert-secondary text-center">
            <p class="text-muted mb-1">Belum ada profil sekolah atau foto profil ditambahkan.</p>
            <a href="{{ route('admin.profilsekolah.index') }}#edit-content" class="btn btn-sm btn-success">Tambah Profil</a>
        </div>
        @endif

        <hr>

        <!-- Sambutan Kepala Sekolah -->
        <div class="row g-3">
            @if($profilSekolah && $profilSekolah->foto_kepala_sekolah)
            <div class="col-md-3 text-center">
                <img src="{{ asset('storage/' . $profilSekolah->foto_kepala_sekolah) }}" class="img-fluid rounded" style="max-height: 160px;" alt="Kepala Sekolah">
            </div>
            @endif

            <div class="col-md-9 position-relative">
                <!-- Dropdown Sambutan -->
                <div class="dropdown position-absolute end-0 top-0 mt-2 me-2">
                    <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="dropdown">
                        <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        @if($profilSekolah && $profilSekolah->sambutan_kepsek)
                            <li><a class="dropdown-item" href="{{ route('admin.profilsekolah.index') }}#edit-sambutan">Edit</a></li>
                            <li>
                                <form action="{{ route('admin.profilsekolah.destroy') }}" method="POST" onsubmit="return confirm('Hapus sambutan?')">
                                    @csrf @method('DELETE')
                                    <input type="hidden" name="type" value="sambutan_kepsek">
                                    <button class="dropdown-item text-danger">Hapus </button>
                                </form>
                            </li>
                        @endif
                    </ul>
                </div>

                <h5>Sambutan Kepala Sekolah</h5>
                <p class="mt-2">{!! $profilSekolah->sambutan_kepsek ?? 'Belum ada sambutan kepala sekolah.' !!}</p>
                @if(!$profilSekolah || !$profilSekolah->sambutan_kepsek)
                    <a href="{{ route('admin.profilsekolah.index') }}#edit-sambutan" class="btn btn-sm btn-success mt-2">Tambah Data</a>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Logo, Banner, Foto -->
<div class="row mb-4">
    @php
        $items = [
            ['label' => 'Logo Sekolah', 'image' => $profilSekolah->logo ?? null, 'type' => 'logo', 'hash' => '#edit-logo'],
            ['label' => 'Banner', 'image' => $profilSekolah->banner ?? null, 'type' => 'banner', 'hash' => '#edit-banner'],
            ['label' => 'Foto Profil Sekolah', 'image' => $profilSekolah->foto_profil ?? null, 'type' => 'foto_profil', 'hash' => '#edit-foto']
        ];
    @endphp

    @foreach($items as $item)
    <div class="col-md-4 mb-3">
        <div class="card h-100 position-relative text-center shadow-sm">
            <div class="card-body">
                <div class="dropdown position-absolute end-0 top-0 mt-2 me-2">
                    <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="dropdown">
                        <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        @if($item['image'])
                        <li><a class="dropdown-item" href="{{ route('admin.profilsekolah.index') . $item['hash'] }}">Edit</a></li>
                        <li>
                            <form action="{{ route('admin.profilsekolah.destroy') }}" method="POST" onsubmit="return confirm('Hapus data ini?')">
                                @csrf @method('DELETE')
                                <input type="hidden" name="type" value="{{ $item['type'] }}">
                                <button class="dropdown-item text-danger">Hapus</button>
                            </form>
                        </li>
                        @endif
                    </ul>
                </div>
                <h5 class="card-title">{{ $item['label'] }}</h5>
                @if($item['image'])
                    <img src="{{ asset('storage/' . $item['image']) }}" class="img-fluid" style="max-height: 120px;">
                @else
                    <p class="text-muted">Belum ada {{ strtolower($item['label']) }}.</p>
                    <a href="{{ route('admin.profilsekolah.index') . $item['hash'] }}" class="btn btn-sm btn-success">Tambah Data</a>
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div>

<!-- Visi & Misi dan Struktur Organisasi -->
<div class="row mb-4">
    <!-- Visi & Misi -->
    <div class="col-md-6 mb-3">
        <div class="card h-100 position-relative shadow-sm">
            <div class="card-body">
                <h4 class="mb-3">Visi dan Misi</h4>

                <!-- Visi -->
                <div class="mb-3 position-relative">
                    <h6>Visi</h6>
                    <div class="dropdown position-absolute end-0 top-0 mt-1 me-1">
                        <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="dropdown">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            @if($vision)
                                <li><a class="dropdown-item" href="{{ route('admin.visimisi.index', $vision->id) }}">Edit</a></li>
                                <li>
                                    <form action="{{ route('admin.visi.destroy', $vision->id) }}" method="POST" onsubmit="return confirm('Hapus visi?')">
                                        @csrf @method('DELETE')
                                        <button class="dropdown-item text-danger">Hapus</button>
                                    </form>
                                </li>
                            @endif
                        </ul>
                    </div>
                    <p class="mt-3">{!! $vision->content ?? 'Belum ada visi ditambahkan.' !!}</p>
                    @if(!$vision)
                        <a href="{{ route('admin.visimisi.index') }}" class="btn btn-sm btn-success">Tambah Visi</a>
                    @endif
                </div>

                <hr>

                <!-- Misi -->
                <div class="position-relative">
                    <h6>Misi</h6>
                    <div class="dropdown position-absolute end-0 top-0 mt-1 me-1">
                        <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="dropdown">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            @if($mission)
                                <li><a class="dropdown-item" href="{{ route('admin.visimisi.index', $mission->id) }}">Edit</a></li>
                                <li>
                                    <form action="{{ route('admin.misi.destroy', $mission->id) }}" method="POST" onsubmit="return confirm('Hapus misi?')">
                                        @csrf @method('DELETE')
                                        <button class="dropdown-item text-danger">Hapus</button>
                                    </form>
                                </li>
                            @endif
                        </ul>
                    </div>
                    <p class="mt-3">{!! $mission->content ?? 'Belum ada misi ditambahkan.' !!}</p>
                    @if(!$mission)
                        <a href="{{ route('admin.visimisi.index') }}" class="btn btn-sm btn-success">Tambah Misi</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <!-- Struktur Organisasi -->
    <div class="col-md-6 mb-3 position-relative text-center">
        <h4 class="mb-3">Struktur Organisasi</h4>

        <div class="dropdown position-absolute end-0 top-0 mt-2 me-2">
            @if($struktur)
                <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="dropdown">
                    <i class="bi bi-three-dots-vertical"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <form action="{{ route('admin.strukturorganisasi.destroy') }}" method="POST" onsubmit="return confirm('Hapus struktur organisasi?')">
                            @csrf @method('DELETE')
                            <button class="dropdown-item text-danger">Hapus</button>
                        </form>
                    </li>
                </ul>
            @endif
        </div>

        @if($struktur && $struktur->image)
            <img src="{{ asset('storage/' . $struktur->image) }}"  style="max-height: 500px; width: 100%; object-fit: contain;">
            <button class="btn btn-sm btn-info position-absolute start-0 bottom-0 m-3" data-bs-toggle="modal" data-bs-target="#strukturModal">
                Lihat Gambar
            </button>
        @else
            <p class="text-muted mt-2">Belum ada gambar struktur organisasi diunggah.</p>
            <a href="{{ route('admin.strukturorganisasi.index') }}" class="btn btn-sm btn-success mt-2">Tambah Gambar</a>
        @endif
    </div>
</div>

<!-- Modal Struktur -->
@if($struktur)
<div class="modal fade" id="strukturModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Struktur Organisasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body text-center">
                <img src="{{ asset('storage/' . $struktur->image) }}" class="img-fluid">
            </div>
        </div>
    </div>
</div>
@endif

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'success',
        title: "{{ session('success') }}",
        background: '#006400',
        color: '#ffffff',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
    });
</script>
@endif

@if(session('deleted'))
<script>
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'error',
        title: "{{ session('deleted') }}",
        background: '#721c24',
        color: '#ffffff',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
    });
</script>
@endif

@if(session('updated'))
<script>
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'info',
        title: "{{ session('updated') }}",
        background: '#000080',
        color: '#ffffff',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
    });
</script>
@endif

<!-- Counter Animation -->
<script>
document.addEventListener("DOMContentLoaded", function () {
    const counters = document.querySelectorAll('.count-up');
    counters.forEach(counter => {
        let target = +counter.getAttribute('data-target');
        let count = 0;
        const speed = 30;
        const updateCount = () => {
            const increment = Math.ceil(target / 40);
            if (count < target) {
                count += increment;
                counter.innerText = count;
                setTimeout(updateCount, speed);
            } else {
                counter.innerText = target;
            }
        };
        updateCount();
    });
});
</script>
@endsection
