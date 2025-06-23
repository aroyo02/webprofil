@extends('admin.layout.navbar')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">Daftar Guru dan Jumlah Siswa</h2>

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

    {{-- Jumlah Siswa --}}
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Jumlah Siswa</h5>
            <p> {!!  $siswa ? $siswa->jumlah_siswa : 'Belum ada data' !!}</p>
                @if($siswa)
                    <a href="{{ route('admin.siswaguru.create', $siswa->id) }}" class="btn btn-sm btn-primary mb-2">Edit</a>
                    <form action="{{ route('admin.siswa.destroy', $siswa->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus jumlah siswa?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                @else
                    <a href="{{ route('admin.siswaguru.create') }}" class="btn btn-sm btn-success mb-2">Tambah jumlah siswa</a>
                @endif
        </div>
    </div>

    {{-- Daftar Guru --}}
    <div class="row">
        @foreach($gurus as $guru)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <img src="{{ asset('storage/' . $guru->gambar) }}" class="card-img-top" alt="Foto Guru" width="100">
                <div class="card-body">
                    <h5 class="card-title">{{ $guru->nama }}</h5>
                    <p class="card-text">{{ $guru->keterangan }}</p>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('admin.guru.edit', $guru->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.guru.destroy', $guru->id) }}" method="POST" onsubmit="return confirm('Yakin ingin hapus data ini?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
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
