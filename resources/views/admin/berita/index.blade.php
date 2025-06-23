@extends('admin.layout.navbar')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Daftar Berita</h2>

{{-- Validasi dari Laravel --}}
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
        @forelse ($beritas as $berita)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    @if($berita->gambar)
                        <img src="{{ asset('storage/' . $berita->gambar) }}" class="card-img-top" alt="{{ $berita->judul }}" style="height: 200px; object-fit: cover;">
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $berita->judul }}</h5>
                        <p class="card-text text-muted"><small>{{ $berita->created_at->format('d M Y') }}</small></p>
                        <div class="mt-auto">
                            <a href="{{ route('admin.berita.show', $berita->id) }}" class="btn btn-info btn-sm mb-1">Lihat Detail</a>
                            <a href="{{ route('admin.berita.edit', $berita->id) }}" class="btn btn-warning btn-sm mb-1">Edit</a>
                            <form action="{{ route('admin.berita.destroy', $berita->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus berita ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm mb-1">Hapus</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <p>Tidak ada berita tersedia.</p>
        @endforelse
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
