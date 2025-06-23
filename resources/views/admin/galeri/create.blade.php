@extends('admin.layout.navbar')

@section('content')
<h1>Tambah Galeri</h1>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="files">Pilih File (Gambar/Video - boleh lebih dari satu)</label>
        <input type="file" name="files[]" class="form-control" multiple required>
    </div>
    <button type="submit" class="btn btn-primary">Upload</button>
</form>
@endsection