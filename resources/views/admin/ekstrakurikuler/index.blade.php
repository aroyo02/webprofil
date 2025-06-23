@extends('admin.layout.navbar')

@section('content')
<h1>Daftar Ekstrakurikuler</h1>

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
    @foreach($ekstrakurikulers as $item)
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm rounded-4 border-0 h-100 text-center">
            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                @if($item->logo)
                    <img src="{{ asset('storage/' . $item->logo) }}" alt="{{ $item->nama }}" class="mb-3 rounded-3" style="width: 100px; height: 100px; object-fit: cover;">
                @endif
                <h5 class="card-title fw-semibold">{{ $item->nama }}</h5>
                <button class="btn btn-outline-info btn-sm mt-2" data-bs-toggle="modal" data-bs-target="#modalDeskripsi{{ $item->id }}">
                    Lihat Deskripsi
                </button>
            </div>
            <div class="card-footer bg-white border-0 d-flex justify-content-center gap-2">
                <a href="{{ route('admin.ekstrakurikuler.edit', $item->id) }}" class="btn btn-primary btn-sm rounded-pill">Edit</a>
                <form action="{{ route('admin.ekstrakurikuler.destroy', $item->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm rounded-pill">Hapus</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal Deskripsi -->
    <div class="modal fade" id="modalDeskripsi{{ $item->id }}" tabindex="-1" aria-labelledby="modalDeskripsiLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg"> <!-- modal-lg untuk ukuran lebar -->
            <div class="modal-content rounded-4">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="modalDeskripsiLabel{{ $item->id }}">{{ $item->nama }}</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                </div>
                <div class="modal-body">
                    <div class="row align-items-center">
                        <div class="col-md-5 text-center mb-3 mb-md-0">
                            @if($item->logo)
                                <img src="{{ asset('storage/' . $item->logo) }}" alt="{{ $item->nama }}" class="img-fluid rounded-3" style="max-height: 200px; object-fit: cover;">
                            @endif
                        </div>
                        <div class="col-md-7">
                            <p class="mb-0">{{ $item->deskripsi }}</p>
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
