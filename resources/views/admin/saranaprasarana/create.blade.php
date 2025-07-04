@extends('admin.layout.navbar')

@section('content')
<div class="container">
    <h3>{{ isset($item) ? 'Edit' : 'Tambah' }} Sarana Prasarana</h3>

    {{-- Notifikasi error validasi --}}
    @if($errors->any())
        <div class="alert alert-danger">
            <strong>Terjadi kesalahan:</strong>
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form Tambah / Edit --}}
    <form action="{{ isset($item) ? route('admin.saranaprasarana.update', $item->id) : route('admin.saranaprasarana.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if (isset($item))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Sarana Prasarana <span class="text-danger">*</span></label>
            <input 
                type="text" 
                class="form-control @error('nama') is-invalid @enderror" 
                id="nama" 
                name="nama" 
                value="{{ old('nama', $item->nama ?? '') }}" 
                required
            >
            @error('nama')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="gambar" class="form-label">Upload Gambar 
                @if(!isset($item)) <span class="text-danger">*</span> @endif
            </label>
            <input 
                type="file" 
                class="form-control @error('gambar') is-invalid @enderror" 
                id="gambar" 
                name="gambar" 
                accept="image/*"
                onchange="previewGambar(event)"
                {{ isset($item) ? '' : 'required' }}
            >
            @error('gambar')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3" id="previewContainer" style="display: {{ isset($item) && $item->gambar ? 'block' : 'none' }}">
            <p>Preview Gambar:</p>
            <img id="previewImage" 
                 src="{{ isset($item) && $item->gambar ? asset('storage/' . $item->gambar) : '' }}" 
                 alt="Preview Gambar" 
                 style="max-height: 200px; border: 1px solid #ccc;">
        </div>

        <div class="mb-3">
            <label for="deskripsi" class="form-label">Deskripsi <span class="text-danger">*</span></label>
            <textarea name="deskripsi" id="summernote" class="form-control @error('deskripsi') is-invalid @enderror" rows="4">
                {{ old('deskripsi', $item->deskripsi ?? '') }}
            </textarea>
            @error('deskripsi')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">
            {{ isset($item) ? 'Update' : 'Tambah' }}
        </button>
    </form>
</div>

{{-- SweetAlert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

@if(session('success'))
<script>
    Swal.fire({ toast: true, position: 'top-end', icon: 'success', title: "{{ session('success') }}", background: '#006400', color: '#ffffff', showConfirmButton: false, timer: 3000, timerProgressBar: true });
</script>
@endif

@if(session('deleted'))
<script>
    Swal.fire({ toast: true, position: 'top-end', icon: 'error', title: "{{ session('deleted') }}", background: '#721c24', color: '#ffffff', showConfirmButton: false, timer: 3000, timerProgressBar: true });
</script>
@endif

@if(session('updated'))
<script>
    Swal.fire({ toast: true, position: 'top-end', icon: 'info', title: "{{ session('updated') }}", background: '#000080', color: '#ffffff', showConfirmButton: false, timer: 3000, timerProgressBar: true });
</script>
@endif

{{-- Summernote --}}
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

    function previewGambar(event) {
        const file = event.target.files[0];
        if (file) {
            const imgPreview = document.getElementById('previewImage');
            const container = document.getElementById('previewContainer');
            imgPreview.src = URL.createObjectURL(file);
            container.style.display = 'block';
        }
    }
</script>
@endpush
@endsection
