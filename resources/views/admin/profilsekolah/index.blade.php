@extends('layouts.admin') 

@section('content')
<div class="container mt-4">
    <h2>Profil Sekolah</h2>

    {{-- Notifikasi Sukses atau Error --}}
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @elseif (session('updated'))
        <div class="alert alert-success">{{ session('updated') }}</div>
    @elseif (session('deleted'))
        <div class="alert alert-warning">{{ session('deleted') }}</div>
    @elseif (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

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

    {{-- Form Tambah / Edit --}}
    <form id="profilForm" action="{{ $profilSekolah ? route('admin.profilsekolah.update') : route('admin.profilsekolah.store') }}" method="POST">
        @csrf
        @if ($profilSekolah)
            @method('POST') {{-- Pakai POST karena update-nya tanpa ID --}}
        @endif

        <div class="mb-3">
            <label for="content" class="form-label">Isi Profil</label>
            <textarea name="content" id="content" rows="6" class="form-control">{{ old('content', $profilSekolah->content ?? '') }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">
            {{ $profilSekolah ? 'Update Profil' : 'Tambah Profil' }}
        </button>
    </form>
</div>

{{-- Validasi JavaScript --}}
<script>
    document.getElementById('profilForm').addEventListener('submit', function(e) {
        const content = document.getElementById('content').value.trim();
        if (content === '') {
            e.preventDefault(); // Cegah form submit
            alert('Harap isi profil sekolah terlebih dahulu.');
        }
    });
</script>
@endsection
