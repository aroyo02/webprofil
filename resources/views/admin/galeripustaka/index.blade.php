@extends('admin.layout.navbar')

@section('content')
<h1 class="mb-4">Daftar Pustaka</h1>

<a href="{{ route('admin.galeripustaka.create') }}" class="btn btn-success mb-3">+ Tambah Buku</a>

<div class="row">
    @forelse ($bukus as $buku)
    <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
        <div class="card h-100 shadow-sm rounded-4">
            <div class="position-relative">
                <img src="{{ asset('storage/' . $buku->sampul) }}" class="card-img-top rounded-top" style="height: 250px; object-fit: cover;" alt="Sampul Buku">

                <!-- Dropdown Aksi -->
                <div class="position-absolute top-0 end-0 m-2">
                    <div class="dropdown">
                        <button class="btn btn-sm btn-light border-0" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-three-dots-vertical"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a href="{{ route('admin.galeripustaka.edit', $buku->id) }}" class="dropdown-item">Edit</a></li>
                            <li>
                                <button class="dropdown-item" data-bs-toggle="modal" data-bs-target="#detailModal{{ $buku->id }}">Lihat Detail</button>
                            </li>
                            <li>
                                <form action="{{ route('admin.galeripustaka.destroy', $buku->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="dropdown-item text-danger">Hapus</button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <h5 class="card-title fw-bold">{{ $buku->judul }}</h5>
                <ul class="list-unstyled mb-0">
                    <li><strong>Penulis:</strong> {{ $buku->penulis }}</li>
                    <li><strong>Penerbit:</strong> {{ $buku->penerbit }}</li>
                    <li><strong>Stok:</strong> {{ $buku->stok }}</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Modal Detail -->
    <div class="modal fade" id="detailModal{{ $buku->id }}" tabindex="-1" aria-labelledby="detailModalLabel{{ $buku->id }}" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content rounded-4">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold" id="detailModalLabel{{ $buku->id }}">Detail Buku</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4 text-center mb-3 mb-md-0">
                            <img src="{{ asset('storage/' . $buku->sampul) }}" alt="Sampul Buku" class="img-fluid img-thumbnail">
                        </div>
                        <div class="col-md-8">
                            <h4 class="fw-bold mb-2">{{ $buku->judul }}</h4>
                            <div class="mb-1"><strong>Penulis:</strong> {{ $buku->penulis }}</div>
                            <div class="mb-1"><strong>Penerbit:</strong> {{ $buku->penerbit }}</div>
                            <div class="mb-1"><strong>Tahun Terbit:</strong> {{ $buku->tahun_terbit }}</div>
                            <div class="mb-1"><strong>Stok:</strong> {{ $buku->stok }}</div>
                            <div class="mb-1"><strong>Kategori:</strong> {{ $buku->kategori }}</div>
                            <div class="mt-4">
                                <strong>Deskripsi:</strong>
                                <div>{!! $buku->deskripsi !!}</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    @empty
    <div class="col-12">
        <div class="alert alert-info">Belum ada data buku.</div>
    </div>
    @endforelse
</div>

{{-- Bootstrap Icons --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

{{-- SweetAlert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
