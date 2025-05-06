@extends('layouts.admin')

@section('content')

<div class="container-fluid">
    <h1 class="mb-4">Dashboard Admin SDN 1 Wirasaba</h1>

    <!-- Welcome Text -->
    <div class="alert alert-primary">
        Selamat datang di Dashboard Admin! Kelola data sekolah dengan mudah di sini.
    </div>

    <!-- Card Summary -->
    <div class="row">
        <div class="col-md-3 mb-3">
            <div class="card text-white bg-success">
                <div class="card-body">
                    <h5 class="card-title">Total Siswa</h5>
                    <p class="card-text fs-3">150</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <h5 class="card-title">Total Guru</h5>
                    <p class="card-text fs-3">20</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Total Ekstrakurikuler</h5>
                    <p class="card-text fs-3">5</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <h5 class="card-title">Total Berita</h5>
                    <p class="card-text fs-3">10</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Profil Sekolah, Visi Misi, Struktur Organisasi -->
    <div class="row mb-4">
        <div class="col-md-4 mb-3">
            <div class="p-3 border rounded h-100">
                <h4>Profil Sekolah</h4>
                <p> {!! $profilsekolah->content ?? 'Belum ada profil sekolah ditambahkan.' !!}</p>
                @if($profilsekolah)
                    <a href="{{ route('admin.profilsekolah.index', $vision->id) }}" class="btn btn-sm btn-primary mb-2">Edit Profil Sekolah</a>
                    <form action="{{ route('admin.profilsekolah.destroy', $vision->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus profil sekolah ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus Profil Sekolah</button>
                    </form>
                @else
                    <a href="{{ route('admin.profilsekolah.index') }}" class="btn btn-sm btn-success mb-2">Tambah Profil Sekolah</a>
                @endif
            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="p-3 border rounded h-100">
                <h4>Visi & Misi</h4>
                <p><strong>Visi:</strong> {!! $vision->content ?? 'Belum ada visi ditambahkan.' !!}</p>
                @if($vision)
                    <a href="{{ route('admin.visimisi.index', $vision->id) }}" class="btn btn-sm btn-primary mb-2">Edit Visi</a>
                    <form action="{{ route('admin.visi.destroy', $vision->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus visi ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus Visi</button>
                    </form>
                @else
                    <a href="{{ route('admin.visimisi.index') }}" class="btn btn-sm btn-success mb-2">Tambah Visi</a>
                @endif

                <hr>

                <p><strong>Misi:</strong> {!! $mission->content ?? 'Belum ada misi ditambahkan.' !!}</p>
                @if($mission)
                    <a href="{{ route('admin.visimisi.index', $mission->id) }}" class="btn btn-sm btn-primary mb-2">Edit Misi</a>
                    <form action="{{ route('admin.misi.destroy', $mission->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus misi ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus Misi</button>
                    </form>
                @else
                    <a href="{{ route('admin.visimisi.index') }}" class="btn btn-sm btn-success mb-2">Tambah Misi</a>
                @endif

            </div>
        </div>

        <div class="col-md-4 mb-3">
            <div class="p-3 border rounded text-center h-100">
                <h4>Struktur Organisasi</h4>
                <img src="{{ asset('images/struktur-dummy.png') }}" alt="Struktur Organisasi" class="img-fluid mt-2">
            </div>
        </div>
    </div>

    <!-- Table Berita Terbaru -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            Berita Terbaru
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Perayaan Hari Pendidikan Nasional</td>
                        <td>02 Mei 2025</td>
                    </tr>
                    <tr>
                        <td>SDN 1 Wirasaba Juara Futsal</td>
                        <td>20 April 2025</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Table Galeri Terbaru -->
    <div class="card mb-4">
        <div class="card-header bg-success text-white">
            Galeri Terbaru
        </div>
        <div class="card-body">
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Judul</th>
                        <th>Tanggal Upload</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Foto Kegiatan Upacara</td>
                        <td>01 Mei 2025</td>
                    </tr>
                    <tr>
                        <td>Foto Lomba 17 Agustus</td>
                        <td>18 Agustus 2024</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

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

@endsection
