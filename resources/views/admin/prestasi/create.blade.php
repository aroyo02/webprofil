@extends('admin.layout.navbar')

@section('content')
<h1>{{ isset($prestasi) ? 'Edit Prestasi' : 'Tambah Prestasi' }}</h1>

{{-- Notifikasi Error & Sukses --}}
@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ isset($prestasi) ? route('admin.prestasi.update', $prestasi->id) : route('admin.prestasi.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($prestasi))
        @method('PUT')
    @endif

    <div class="mb-3">
        <label for="judul" class="form-label">Judul Prestasi</label>
        <input type="text" name="judul" class="form-control" value="{{ old('judul', $prestasi->judul ?? '') }}" required>
    </div>

    <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea name="deskripsi" id="summernote" class="form-control" rows="3">{{ old('deskripsi', $prestasi->deskripsi ?? '') }}</textarea>
    </div>

    <div class="mb-3">
        <label for="gambar" class="form-label">Gambar</label>
        <input type="file" name="gambar" class="form-control">
        @if(isset($prestasi) && $prestasi->gambar)
            <img src="{{ asset('storage/' . $prestasi->gambar) }}" class="img-thumbnail mt-2" style="max-height: 100px;">
        @endif
    </div>

    <button type="submit" class="btn btn-primary">{{ isset($prestasi) ? 'Update' : 'Simpan' }}</button>
</form>

@push('scripts')
<script>
    $('#summernote').summernote({
            placeholder: 'Tulis deskripsi di sini...',
            tabsize: 2,
            height: 300,
            tabDisable: true,
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link',]],
                ['view', ['fullscreen', 'help']]
            ]
        });
</script>
@endpush

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
