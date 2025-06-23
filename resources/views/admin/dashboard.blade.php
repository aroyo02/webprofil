@extends('admin.layout.navbar')

@section('content')
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
                    <p class="card-text fs-3 count-up" data-target="{{ $jumlahSiswa }}">0</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card text-white bg-info">
                <div class="card-body">
                    <h5 class="card-title">Total Guru</h5>
                    <p class="card-text fs-3  count-up"data-target="{{ $jumlahGuru }}">0</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card text-white bg-warning">
                <div class="card-body">
                    <h5 class="card-title">Total Ekstrakurikuler</h5>
                    <p class="card-text fs-3 count-up"data-target="{{ $jumlahEkstrakurikuler }}">0</p>
                </div>
            </div>
        </div>

        <div class="col-md-3 mb-3">
            <div class="card text-white bg-danger">
                <div class="card-body">
                    <h5 class="card-title">Total Sarana Prasarana</h5>
                    <p class="card-text fs-3 count-up"data-target="{{ $jumlahSarana }}">0</p>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-md-4 mb-3">
            <div class="p-3 border rounded h-100">
                <h4>Profil Sekolah</h4>
                <p> {!! $profilsekolah->content ?? 'Belum ada profil sekolah ditambahkan.' !!}</p>
                @if($profilsekolah)
                    <a href="{{ route('admin.profilsekolah.index', $profilsekolah->id) }}" class="btn btn-sm btn-primary mb-2">Edit Profil Sekolah</a>
                    <form action="{{ route('admin.profilsekolah.destroy', $profilsekolah->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus profil sekolah ini?')">
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

                @if($struktur)
                    <img src="{{ asset('storage/' . $struktur->image) }}" alt="Struktur Organisasi" class="img-fluid mt-2" style="max-height: 200px;">

                    <button class="btn btn-sm btn-info mt-2" data-bs-toggle="modal" data-bs-target="#strukturModal">Lihat Gambar</button>

                    <form action="{{ route('admin.strukturorganisasi.destroy') }}" method="POST" class="d-inline-block mt-2" onsubmit="return confirm('Yakin ingin menghapus gambar ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                @else
                    <p class="text-muted mt-2">Belum ada gambar diunggah.</p>
                    <a href="{{ route('admin.strukturorganisasi.index') }}" class="btn btn-sm btn-success mt-2">Tambah Gambar</a>
                @endif
            </div>
        </div>
    </div>

    <!-- Modal Preview Gambar Struktur Organisasi -->
    @if($struktur)
    <div class="modal fade" id="strukturModal" tabindex="-1" aria-labelledby="strukturModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="strukturModalLabel">Struktur Organisasi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
          </div>
          <div class="modal-body text-center">
            <img src="{{ asset('storage/' . $struktur->image) }}" alt="Struktur Organisasi" class="img-fluid">
          </div>
        </div>
      </div>
    </div>
    @endif

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

<script>
    document.addEventListener("DOMContentLoaded", function () {
        const counters = document.querySelectorAll('.count-up');
        counters.forEach(counter => {
            let target = +counter.getAttribute('data-target');
            let count = 0;
            const speed = 30; // lebih kecil = lebih cepat

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
