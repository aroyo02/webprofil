@extends('admin.layout.navbar')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Informasi Kontak</h2>

    @if ($kontak)
        <div class="card mb-4">
            <div class="card-body">
                <h5 class="card-title">Alamat</h5>
                <p class="card-text">{{ $kontak->alamat }}</p>

                <h5 class="card-title">Jam Operasional</h5>
                <p class="card-text">{!! $kontak->jam_operasional !!}</p>

                <h5 class="card-title">Nomor Telepon</h5>
                <p class="card-text">{{ $kontak->telepon }}</p>

                <h5 class="card-title">Email</h5>
                <p class="card-text">{{ $kontak->email }}</p>

                <h5 class="card-title">Lokasi di Google Maps</h5>
                <div class="ratio ratio-16x9">
                    <iframe 
                        src="{{ $kontak->maps_embed }}" 
                        style="border:0;" 
                        allowfullscreen 
                        loading="lazy" 
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>

                <!-- Tombol Edit dan Hapus -->
                <div class="d-flex justify-content-between flex-wrap mt-4">
                    <form action="{{ route('admin.contact.destroy', $kontak->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus data kontak ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Hapus Kontak</button>
                    </form>
                    <a href="{{ route('admin.contact.create') }}" class="btn btn-warning">Edit Kontak</a>
                </div>
            </div>
        </div>
    @else
        <p>Data kontak belum tersedia.</p>
        <a href="{{ route('admin.contact.create') }}" class="btn btn-primary">Tambah Kontak</a>
    @endif
</div>

<!-- SweetAlert2 -->
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
