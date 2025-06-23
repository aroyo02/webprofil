@extends('admin.layout.navbar')

@section('content')
<div class="container">
    <h3>{{ isset($item) ? 'Edit' : 'Tambah' }} Sarana Prasarana</h3>

    {{-- Notifikasi sukses --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

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
                {{ isset($item) ? '' : 'required' }}
            >
            @error('gambar')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        @if(isset($item) && $item->gambar)
            <div class="mb-3">
                <p>Gambar Saat Ini:</p>
                <img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar Sarana" style="max-height: 200px; border: 1px solid #ccc;">
            </div>
        @endif

        <button type="submit" class="btn btn-primary">
            {{ isset($item) ? 'Update' : 'Tambah' }}
        </button>

        <a href="{{ route('admin.saranaprasarana.index') }}"></a>
    </form>
</div>
@endsection
