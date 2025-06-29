@extends('admin.layout.navbar')

@section('content')
<h1 class="mb-4">Dashboard Admin SDN 1 Wirasaba</h1>

<div class="alert alert-primary">
    Selamat datang di Dashboard Admin! Kelola data sekolah dengan mudah di sini.
</div>

<!-- Ringkasan -->
<div class="row">
    <div class="col-md-3 mb-3">
        <div class="card text-white bg-success">
            <div class="card-body">
                <h5 class="card-title">Total Siswa</h5>
                <p class="card-text fs-3 count-up" data-target="{{ $jumlahSiswa }}">0</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card text-white bg-info">
            <div class="card-body">
                <h5 class="card-title">Total Guru</h5>
                <p class="card-text fs-3 count-up" data-target="{{ $jumlahGuru }}">0</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card text-white bg-warning">
            <div class="card-body">
                <h5 class="card-title">Total Ekstrakurikuler</h5>
                <p class="card-text fs-3 count-up" data-target="{{ $jumlahEkstrakurikuler }}">0</p>
            </div>
        </div>
    </div>
    <div class="col-md-3 mb-3">
        <div class="card text-white bg-danger">
            <div class="card-body">
                <h5 class="card-title">Total Sarana Prasarana</h5>
                <p class="card-text fs-3 count-up" data-target="{{ $jumlahSarana }}">0</p>
            </div>
        </div>
    </div>
</div>

<!-- Logo, Banner, Foto Profil -->
<div class="row mb-4">
    <!-- Logo -->
    <div class="col-md-4 mb-3">
        <div class="card h-100 shadow-sm text-center">
            <div class="card-body">
                <h5 class="card-title">Logo Sekolah</h5>
                @if($profilSekolah && $profilSekolah->logo)
                    <img src="{{ asset('storage/' . $profilSekolah->logo) }}" class="img-fluid mb-2" style="max-height: 100px;">
                    <div>
                        <a href="{{ route('admin.profilsekolah.index') }}#edit-logo" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('admin.profilsekolah.destroy') }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <input type="hidden" name="type" value="logo">
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus logo sekolah?')">Hapus</button>
                        </form>
                    </div>
                @else
                    <p class="text-muted">Belum ada logo.</p>
                    <a href="{{ route('admin.profilsekolah.index') }}#edit-logo" class="btn btn-sm btn-success">Tambah Data</a>
                @endif
            </div>
        </div>
    </div>

    <!-- Banner -->
    <div class="col-md-4 mb-3">
        <div class="card h-100 shadow-sm text-center">
            <div class="card-body">
                <h5 class="card-title">Banner</h5>
                @if($profilSekolah && $profilSekolah->banner)
                    <img src="{{ asset('storage/' . $profilSekolah->banner) }}" class="img-fluid mb-2" style="max-height: 100px;">
                    <div>
                        <a href="{{ route('admin.profilsekolah.index') }}#edit-banner" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('admin.profilsekolah.destroy') }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <input type="hidden" name="type" value="banner">
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus banner sekolah?')">Hapus</button>
                        </form>
                    </div>
                @else
                    <p class="text-muted">Belum ada banner.</p>
                    <a href="{{ route('admin.profilsekolah.index') }}#edit-banner" class="btn btn-sm btn-success">Tambah Data</a>
                @endif
            </div>
        </div>
    </div>

    <!-- Foto Profil -->
    <div class="col-md-4 mb-3">
        <div class="card h-100 shadow-sm text-center">
            <div class="card-body">
                <h5 class="card-title">Foto Profil Sekolah</h5>
                @if($profilSekolah && $profilSekolah->foto_profil)
                    <img src="{{ asset('storage/' . $profilSekolah->foto_profil) }}" class="img-fluid mb-2" style="max-height: 100px;">
                    <div>
                        <a href="{{ route('admin.profilsekolah.index') }}#edit-foto" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('admin.profilsekolah.destroy') }}" method="POST" class="d-inline">
                            @csrf @method('DELETE')
                            <input type="hidden" name="type" value="foto_profil">
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus foto profil sekolah?')">Hapus</button>
                        </form>
                    </div>
                @else
                    <p class="text-muted">Belum ada foto profil.</p>
                    <a href="{{ route('admin.profilsekolah.index') }}#edit-foto" class="btn btn-sm btn-success">Tambah Data</a>
                @endif
            </div>
        </div>
    </div>
</div>

<!-- Motto -->
@if($profilSekolah && $profilSekolah->motto)
    <div class="alert alert-info text-center">
        <strong>Motto:</strong> <em>"{{ $profilSekolah->motto }}"</em><br>
        <a href="{{ route('admin.profilsekolah.index') }}#edit-motto" class="btn btn-sm btn-primary mt-2">Edit</a>
        <form action="{{ route('admin.profilsekolah.destroy') }}" method="POST" class="d-inline">
            @csrf @method('DELETE')
            <input type="hidden" name="type" value="motto">
            <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus motto sekolah?')">Hapus</button>
        </form>
    </div>
@else
    <div class="alert alert-secondary text-center">
        <p class="text-muted mb-1">Belum ada motto ditambahkan.</p>
        <a href="{{ route('admin.profilsekolah.index') }}#edit-motto" class="btn btn-sm btn-success">Tambah Data</a>
    </div>
@endif

<!-- Konten Profil -->
<div class="row mb-4">
    <div class="col-md-4 mb-3">
        <div class="p-3 border rounded h-100">
            <h4>Profil Sekolah</h4>
            <p>{!! $profilSekolah && $profilSekolah->content ? $profilSekolah->content : 'Belum ada konten ditambahkan.' !!}</p>
            @if($profilSekolah && $profilSekolah->content)
                <a href="{{ route('admin.profilsekolah.index') }}#edit-content" class="btn btn-sm btn-primary mb-2">Edit</a>
                <form action="{{ route('admin.profilsekolah.destroy') }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <input type="hidden" name="type" value="content">
                    <button class="btn btn-sm btn-danger" onclick="return confirm('Hapus konten profil sekolah?')">Hapus</button>
                </form>
            @else
                <a href="{{ route('admin.profilsekolah.index') }}#edit-content" class="btn btn-sm btn-success">Tambah Data</a>
            @endif
        </div>
    </div>

    <!-- Visi Misi -->
    <div class="col-md-4 mb-3">
        <div class="p-3 border rounded h-100">
            <h4>Visi & Misi</h4>
            <p><strong>Visi:</strong> {!! $vision->content ?? 'Belum ada visi ditambahkan.' !!}</p>
            @if($vision)
                <a href="{{ route('admin.visimisi.index', $vision->id) }}" class="btn btn-sm btn-primary mb-2">Edit Visi</a>
                <form action="{{ route('admin.visi.destroy', $vision->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Hapus Visi</button>
                </form>
            @else
                <a href="{{ route('admin.visimisi.index') }}" class="btn btn-sm btn-success mb-2">Tambah Visi</a>
            @endif
            <hr>
            <p><strong>Misi:</strong> {!! $mission->content ?? 'Belum ada misi ditambahkan.' !!}</p>
            @if($mission)
                <a href="{{ route('admin.visimisi.index', $mission->id) }}" class="btn btn-sm btn-primary mb-2">Edit Misi</a>
                <form action="{{ route('admin.misi.destroy', $mission->id) }}" method="POST" class="d-inline">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Hapus Misi</button>
                </form>
            @else
                <a href="{{ route('admin.visimisi.index') }}" class="btn btn-sm btn-success mb-2">Tambah Misi</a>
            @endif
        </div>
    </div>

    <!-- Struktur Organisasi -->
    <div class="col-md-4 mb-3">
        <div class="p-3 border rounded text-center h-100">
            <h4>Struktur Organisasi</h4>
            @if($struktur)
                <img src="{{ asset('storage/' . $struktur->image) }}" class="img-fluid mt-2" style="max-height: 200px;">
                <button class="btn btn-sm btn-info mt-2" data-bs-toggle="modal" data-bs-target="#strukturModal">Lihat Gambar</button>
                <form action="{{ route('admin.strukturorganisasi.destroy') }}" method="POST" class="d-inline-block mt-2">
                    @csrf @method('DELETE')
                    <button class="btn btn-sm btn-danger">Hapus</button>
                </form>
            @else
                <p class="text-muted mt-2">Belum ada gambar diunggah.</p>
                <a href="{{ route('admin.strukturorganisasi.index') }}" class="btn btn-sm btn-success mt-2">Tambah Gambar</a>
            @endif
        </div>
    </div>
</div>

<!-- Modal Struktur -->
@if($struktur)
<div class="modal fade" id="strukturModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Struktur Organisasi</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
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
