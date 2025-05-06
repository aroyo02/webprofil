@extends('layouts.admin')

@section('content')
<div class="container">
    <h3>Struktur Organisasi</h3>

    {{-- Notifikasi --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif(session('deleted'))
        <div class="alert alert-danger">{{ session('deleted') }}</div>
    @endif

    {{-- Error validasi dari backend --}}
    @if ($errors->has('image'))
        <div class="alert alert-danger">{{ $errors->first('image') }}</div>
    @endif

    {{-- Form Upload --}}
    <form action="{{ route('admin.strukturorganisasi.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="image" class="form-label">Upload Gambar Struktur Organisasi</label>
            <input type="file" class="form-control" name="image" id="imageInput"
                   onchange="previewImage(event)" {{ $struktur ? 'disabled' : '' }} required>
            <small class="text-muted">Maksimal ukuran file: 2MB</small>
        </div>
        <button type="submit" class="btn btn-primary" {{ $struktur ? 'disabled' : '' }}>Upload</button>
    </form>

    {{-- Preview Gambar Baru --}}
    <div class="mt-3" id="imagePreview" style="display: none;">
        <h5>Preview Gambar Baru:</h5>
        <img id="preview" class="img-fluid" style="max-height: 400px; border: 1px solid #ccc; padding: 5px;">
    </div>

    {{-- Gambar yang sudah ada --}}
    @if ($struktur && $struktur->image)
        <div class="mt-4">
            <h5>Gambar Tersimpan Saat Ini:</h5>
            <img src="{{ asset('storage/' . $struktur->image) }}" alt="Struktur Organisasi" class="img-fluid" style="max-height: 400px; border: 1px solid #ccc; padding: 5px;">

            <form action="{{ route('admin.strukturorganisasi.destroy') }}" method="POST" class="mt-3">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Hapus gambar struktur organisasi?')">Hapus</button>
            </form>
        </div>
    @endif
</div>
@endsection

@section('scripts')
<script>
    function previewImage(event) {
        const input = event.target;
        const file = input.files[0];
        const preview = document.getElementById('preview');
        const previewContainer = document.getElementById('imagePreview');

        const maxSize = 2 * 1024 * 1024; // 2MB

        if (file) {
            if (file.size > maxSize) {
                alert("Ukuran gambar maksimal 2MB!");
                input.value = ""; // Reset input
                previewContainer.style.display = 'none';
                return;
            }

            const reader = new FileReader();
            reader.onload = function (e) {
                preview.src = e.target.result;
                previewContainer.style.display = 'block';
            };
            reader.readAsDataURL(file);
        }
    }
</script>
@endsection
