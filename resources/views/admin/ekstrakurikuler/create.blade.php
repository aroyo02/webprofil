@extends('admin.layout.navbar')

@section('content')
<h1>Tambah Ekstrakurikuler</h1>

{{-- Notifikasi Error & Sukses --}}
@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ isset($ekstrakurikuler) ? route('admin.ekstrakurikuler.update', $ekstrakurikuler->id) : route('admin.ekstrakurikuler.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @if(isset($ekstrakurikuler))
        @method('PUT')
    @endif

    <div class="mb-3">
        <label for="nama" class="form-label">Nama Ekstrakurikuler</label>
        <input type="text" name="nama" class="form-control" value="{{ old('nama', $ekstrakurikuler->nama ?? '') }}" required>
    </div>
    <div class="mb-3">
        <label for="deskripsi" class="form-label">Deskripsi</label>
        <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi', $ekstrakurikuler->deskripsi ?? '') }}</textarea>
    </div>
    <div class="mb-3">
        <label for="logo" class="form-label">Logo</label>
        <input type="file" name="logo" class="form-control">
        @if(isset($ekstrakurikuler) && $ekstrakurikuler->logo)
            <img src="{{ asset('storage/' . $ekstrakurikuler->logo) }}" class="img-thumbnail mt-2" style="max-height: 100px;">
        @endif
    </div>

    <button type="submit" class="btn btn-primary">{{ isset($ekstrakurikuler) ? 'Update' : 'Simpan' }}</button>
</form>
@endsection
