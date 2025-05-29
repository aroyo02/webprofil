@extends('layouts.admin')

@section('content')
<h1>Daftar Galeri</h1>
<div class="row">
    @foreach($galeris as $galeri)
        <div class="col-md-3 mb-4">
            @if($galeri->tipe === 'image')
                <img 
                    src="{{ asset('storage/galeri/' . $galeri->file) }}" 
                    class="img-fluid cursor-pointer" 
                    alt="gambar" 
                    data-bs-toggle="modal" 
                    data-bs-target="#modalImage"
                    data-img="{{ asset('storage/galeri/' . $galeri->file) }}"
                >
            @else
                <video width="100%" controls>
                    <source src="{{ asset('storage/galeri/' . $galeri->file) }}" type="video/mp4">
                    Browser tidak mendukung video.
                </video>
            @endif
            <form action="{{ route('admin.galeri.destroy', $galeri->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus file ini?')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger btn-sm mt-2">Hapus</button>
            </form>
        </div>
    @endforeach
</div>

<!-- Modal Bootstrap -->
<div class="modal fade" id="modalImage" tabindex="-1" aria-labelledby="modalImageLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body p-0">
                <img id="modalImagePreview" src="" class="img-fluid w-100" alt="Preview">
            </div>
        </div>
    </div>
</div>

<!-- SweetAlert & Bootstrap Modal Script -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    // Menangani tampilan gambar dalam modal saat diklik
    document.addEventListener('DOMContentLoaded', function () {
        const imageModal = document.getElementById('modalImage');
        const imagePreview = document.getElementById('modalImagePreview');

        imageModal.addEventListener('show.bs.modal', function (event) {
            const triggerImg = event.relatedTarget;
            const imgSrc = triggerImg.getAttribute('data-img');
            imagePreview.src = imgSrc;
        });
    });
</script>

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
