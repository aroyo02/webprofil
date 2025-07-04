@extends('admin.layout.navbar')

@section('content')
<div class="container mt-4">
    <h2>Profil Sekolah</h2>

    {{-- Validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form Profil --}}
    <form id="profilForm" action="{{ $profilSekolah ? route('admin.profilsekolah.update') : route('admin.profilsekolah.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @if ($profilSekolah)
            @method('POST')
        @endif

        {{-- Logo --}}
        <div class="mb-3">
            <label for="logo" class="form-label">Logo Sekolah</label>
            <input type="file" name="logo" class="form-control">
            @if(!empty($profilSekolah->logo))
                <img src="{{ asset('storage/' . $profilSekolah->logo) }}" alt="Logo Sekolah" height="80" class="mt-2">
            @endif
        </div>

        {{-- Banner --}}
        <div class="mb-3">
            <label for="banner" class="form-label">Banner</label>
            <input type="file" name="banner" class="form-control">
            @if(!empty($profilSekolah->banner))
                <img src="{{ asset('storage/' . $profilSekolah->banner) }}" alt="Banner Sekolah" height="80" class="mt-2">
            @endif
        </div>

        {{-- Foto Profil Sekolah --}}
        <div class="mb-3">
            <label for="foto_profil" class="form-label">Foto Profil Sekolah</label>
            <input type="file" name="foto_profil" class="form-control">
            @if(!empty($profilSekolah->foto_profil))
                <img src="{{ asset('storage/' . $profilSekolah->foto_profil) }}" alt="Foto Profil" height="80" class="mt-2">
            @endif
        </div>

        {{-- Foto Kepala Sekolah --}}
        <div class="mb-3">
            <label for="foto_kepala_sekolah" class="form-label">Foto Kepala Sekolah</label>
            <input type="file" name="foto_kepala_sekolah" class="form-control">
            @if(!empty($profilSekolah->foto_kepala_sekolah))
                <img src="{{ asset('storage/' . $profilSekolah->foto_kepala_sekolah) }}" alt="Foto Kepala Sekolah" height="80" class="mt-2">
            @endif
        </div>

        {{-- Motto --}}
        <div class="mb-3">
            <label for="motto" class="form-label">Motto / Slogan</label>
            <input type="text" name="motto" class="form-control" value="{{ old('motto', $profilSekolah->motto ?? '') }}">
        </div>

        {{-- Sambutan Kepala Sekolah --}}
        <div class="mb-3">
            <label for="sambutan_kepsek" class="form-label">Sambutan Kepala Sekolah</label>
            <textarea name="sambutan_kepsek" id="sambutan_kepsek" rows="6" class="form-control">{{ old('sambutan_kepsek', $profilSekolah->sambutan_kepsek ?? '') }}</textarea>
        </div>

        {{-- Isi Profil --}}
        <div class="mb-3">
            <label for="content" class="form-label">Isi Profil Sekolah</label>
            <textarea name="content" id="content" rows="6" class="form-control">{{ old('content', $profilSekolah->content ?? '') }}</textarea>
        </div>

        {{-- Tombol --}}
        @php
            $hasData = $profilSekolah &&
                ($profilSekolah->logo || $profilSekolah->banner || $profilSekolah->foto_profil || $profilSekolah->foto_kepala_sekolah || $profilSekolah->motto || $profilSekolah->content || $profilSekolah->sambutan_kepsek);
        @endphp

        <button type="submit" class="btn btn-{{ $hasData ? 'primary' : 'success' }}">
            {{ $hasData ? 'Update Profil' : 'Tambah Profil' }}
        </button>
    </form>
</div>


@push('scripts')
<script>
    $(document).ready(function() {
        $('#content').summernote({
            height: 300,
            placeholder: 'Tulis isi profil sekolah di sini...',
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link']],
                ['view', ['fullscreen']]
            ]
        });

        $('#sambutan_kepsek').summernote({
            height: 300,
            placeholder: 'Tulis sambutan kepala sekolah di sini...',
            toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'italic', 'underline', 'clear']],
                ['fontname', ['fontname']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link']],
                ['view', ['fullscreen']]
            ]
        });
    });
</script>
@endpush
@endsection
