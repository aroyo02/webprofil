@extends('admin.layout.navbar')

@section('content')
<h1>Daftar Prestasi</h1>

{{-- Notifikasi --}}
@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row">
    @foreach($prestasis as $item)
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm rounded-4 border-0 h-100 position-relative">
            <!-- Dropdown Aksi di Pojok Kanan Atas -->
            <div class="position-absolute top-0 end-0 p-2">
                <div class="dropdown">
                    <button class="btn btn-sm text-dark" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-three-dots-vertical"></i>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#modalDeskripsi{{ $item->id }}">
                                <i class="bi bi-eye"></i> Lihat Deskripsi
                            </button>
                        </li>
                        <li>
                            <a href="{{ route('admin.prestasi.edit', $item->id) }}" class="dropdown-item">
                                <i class="bi bi-pencil-square"></i> Edit
                            </a>
                        </li>
                        <li>
                            <form action="{{ route('admin.prestasi.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="bi bi-trash"></i> Hapus
                                </button>
                            </form>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Isi Card -->
            <div class="card-body d-flex flex-column align-items-center justify-content-center mt-3">
                @if($item->gambar)
                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="mb-3 rounded-3" style="width: 100px; height: 100px; object-fit: cover;">
                @endif
                <h5 class="card-title fw-semibold text-center">{{ $item->judul }}</h5>
            </div>
        </div>
    </div>

    <!-- Modal Deskripsi -->
    <div class="modal fade" id="modalDeskripsi{{ $item->id }}" tabindex="-1" aria-labelledby="modalDeskripsiLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content rounded-4">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="modalDeskripsiLabel{{ $item->id }}">{{ $item->judul }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <div class="row align-items-center">
                        <div class="col-md-5 text-center mb-3 mb-md-0">
                            @if($item->gambar)
                                <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="img-fluid rounded-3" style="max-height: 200px; object-fit: cover;">
                            @endif
                        </div>
                        <div class="col-md-7">
                            <p class="mb-0">{!! $item->deskripsi !!}</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    @endforeach
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
