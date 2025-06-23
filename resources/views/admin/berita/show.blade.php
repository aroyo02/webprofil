@extends('admin.layout.navbar')

@section('content')
<style>
    .img-detail {
        max-width: 100%;
        height: 400px;
        object-fit: cover;
        border-radius: 10px;
        margin-bottom: 20px;
    }
</style>

<div class="container mt-4">
    <h2 class="mb-2">{{ $berita->judul }}</h2>
    
    <p class="text-muted">{{ $berita->created_at->format('d M Y') }}</p>

    @if($berita->gambar)
        <img src="{{ asset('storage/' . $berita->gambar) }}" class="img-fluid img-detail" alt="Gambar Berita">
    @endif

    <div>{!! $berita->deskripsi !!}</div>

    <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary mt-4">Kembali</a>
</div>
@endsection
