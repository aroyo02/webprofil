@extends('admin.layout.navbar')

@section('content')
<h1 class="mb-4">Galeri Kegiatan</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="row">
    @foreach($galeris as $galeri)
        <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="card h-100 shadow-sm position-relative">
                @if($galeri->tipe === 'image')
                    <img 
                        src="{{ asset('storage/galeri/' . $galeri->file) }}" 
                        class="card-img-top cursor-pointer rounded-top" 
                        alt="gambar" 
                        data-bs-toggle="modal" 
                        data-bs-target="#modalImage"
                        data-img="{{ asset('storage/galeri/' . $galeri->file) }}"
                        style="object-fit: cover; height: 200px;"
                    >
                @else
                    <video height="200" controls class="w-100 rounded-top" style="object-fit: cover;">
                        <source src="{{ asset('storage/galeri/' . $galeri->file) }}" type="video/mp4">
                        Browser tidak mendukung video.
                    </video>
                @endif

                <div class="card-body pt-3 pb-2 px-3">
                    <div class="d-flex justify-content-between align-items-start">
                        <p class="fw-semibold mb-0">{{ $galeri->judul }}</p>
                        <!-- Dropdown Titik 3 -->
                        <div class="dropdown">
                            <button class="btn btn-sm p-0 border-0 bg-transparent" data-bs-toggle="dropdown">
                                <i class="bi bi-three-dots-vertical"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="{{ route('admin.galeri.edit', $galeri->id) }}">Edit</a></li>
                                <li>
                                    <form action="{{ route('admin.galeri.destroy', $galeri->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus file ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item text-danger">Hapus</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>

<!-- Modal Gambar -->
<div class="modal fade" id="modalImage" tabindex="-1" aria-labelledby="modalImageLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content rounded-4">
            <div class="modal-body p-0 text-center">
                <img id="modalImagePreview" src="" class="img-fluid w-100 zoomable" alt="Preview">
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap Icon -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

<!-- Zoom CSS -->
<style>
    .zoomable {
        transition: transform 0.3s ease;
        cursor: zoom-in;
    }
    .zoomable.zoomed {
        transform: scale(1.8);
        cursor: zoom-out;
    }
</style>

<!-- Script Modal Gambar -->
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const imageModal = document.getElementById('modalImage');
        const imagePreview = document.getElementById('modalImagePreview');

        imageModal.addEventListener('show.bs.modal', function (event) {
            const triggerImg = event.relatedTarget;
            const imgSrc = triggerImg.getAttribute('data-img');
            imagePreview.src = imgSrc;
            imagePreview.classList.remove('zoomed');
        });

        imagePreview.addEventListener('click', function () {
            imagePreview.classList.toggle('zoomed');
        });
    });
</script>

<!-- SweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
@endsection
