@extends('admin.layout.navbar')

@section('content')
<div class="container mt-4">
    <h2 class="mb-4">{{ $kontak ? 'Edit Kontak' : 'Tambah Kontak' }}</h2>

    <form action="{{ $kontak ? route('admin.contact.update', $kontak->id) : route('admin.contact.store') }}" method="POST">
        @csrf
        @if($kontak)
            @method('PUT')
        @endif

        <!-- Alamat -->
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat"
                value="{{ old('alamat', $kontak->alamat ?? '') }}" required>
            @error('alamat')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Jam Operasional -->
        <div class="mb-3">
            <label for="jam_operasional" class="form-label">Jam Operasional</label>
            <textarea id="summernote" class="form-control @error('jam_operasional') is-invalid @enderror" name="jam_operasional" required>
                {{ old('jam_operasional', $kontak->jam_operasional ?? '') }}
            </textarea>
            @error('jam_operasional')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


        <!-- Telepon -->
        <div class="mb-3">
            <label for="telepon" class="form-label">Nomor Telepon</label>
            <input type="text" class="form-control @error('telepon') is-invalid @enderror" id="telepon" name="telepon"
                value="{{ old('telepon', $kontak->telepon ?? '') }}" required>
            @error('telepon')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                value="{{ old('email', $kontak->email ?? '') }}" required>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <!-- Maps Embed -->
        <div class="mb-3">
            <label for="maps_embed" class="form-label">Link Embed Google Maps</label>
            <input 
                type="url" 
                class="form-control @error('maps_embed') is-invalid @enderror" 
                id="maps_embed" 
                name="maps_embed" 
                value="{{ old('maps_embed', $kontak->maps_embed ?? '') }}" 
                placeholder="https://www.google.com/maps/embed?pb=..." 
                required
            >
            @error('maps_embed')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="form-text">Masukkan link dari kode embed Google Maps, hanya bagian <code>src</code> (bukan seluruh iframe).</div>
        </div>

        @if(!empty($kontak->maps_embed))
            <div class="mb-3">
                <label class="form-label">Pratinjau Google Maps:</label>
                <div class="ratio ratio-16x9">
                    <iframe 
                        src="{{ $kontak->maps_embed }}" 
                        style="border:0;" 
                        allowfullscreen="" 
                        loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        @endif


        <button type="submit" class="btn btn-primary">{{ $kontak ? 'Update' : 'Simpan' }}</button>
    </form>
</div>

{{-- Summernote --}}
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.20/dist/summernote.min.css" rel="stylesheet">

<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 300,
            placeholder: 'Tulis jam operasional sekolah di sini...',
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link']],
                ['view', ['fullscreen', 'codeview']]
            ]
        });
    });
</script>
@endsection
