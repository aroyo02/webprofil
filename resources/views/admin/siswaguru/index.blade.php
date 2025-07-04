@extends('admin.layout.navbar')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Daftar Guru dan Jumlah Siswa</h2>

    {{-- Validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Jumlah Siswa --}}
    <div class="card mb-4 position-relative">
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-start">
                <div>
                    <h5 class="card-title">Jumlah Siswa</h5>
                    <p class="mb-0">{!! $siswa ? $siswa->jumlah_siswa : 'Belum ada data' !!}</p>
                </div>

                @if($siswa)
                <div class="dropdown">
                    <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="dropdown">
                        <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a href="{{ route('admin.siswaguru.create', $siswa->id) }}" class="dropdown-item">Edit</a>
                        </li>
                        <li>
                            <form action="{{ route('admin.siswa.destroy', $siswa->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus jumlah siswa?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="dropdown-item text-danger">Hapus</button>
                            </form>
                        </li>
                    </ul>
                </div>
                @else
                    <a href="{{ route('admin.siswaguru.create') }}" class="btn btn-sm btn-success">Tambah jumlah siswa</a>
                @endif
            </div>
        </div>
    </div>

    {{-- Daftar Guru --}}
    <div class="row">
        @foreach($gurus as $guru)
        <div class="col-md-3 mb-4">
            <div class="card shadow-sm h-100 position-relative text-center border-0 rounded-4">
                {{-- Dropdown Aksi --}}
                <div class="dropdown position-absolute end-0 top-0 mt-2 me-2">
                    <button class="btn btn-sm btn-outline-secondary" data-bs-toggle="dropdown">
                        <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a href="{{ route('admin.guru.edit', $guru->id) }}" class="dropdown-item">Edit</a>
                        </li>
                        <li>
                            <form action="{{ route('admin.guru.destroy', $guru->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="dropdown-item text-danger">Hapus</button>
                            </form>
                        </li>
                    </ul>
                </div>

                {{-- Konten Card --}}
                @if($guru->gambar)
                    <img src="{{ asset('storage/' . $guru->gambar) }}" class="rounded-top mx-auto mt-3" alt="Foto Guru" style="width: 80px; height: 80px; object-fit: cover;">
                @endif
                <div class="card-body pt-2 pb-3 px-3">
                    <h6 class="mb-1 fw-bold">{{ $guru->nama }}</h6>
                    <p class="text-muted small mb-0">{{ $guru->keterangan }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>

{{-- SweetAlert --}}
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
