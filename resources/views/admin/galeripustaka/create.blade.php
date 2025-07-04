@extends('admin.layout.navbar')

@section('content')
<h1>{{ isset($buku) ? 'Edit Buku' : 'Tambah Buku' }}</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form 
    action="{{ isset($buku) ? route('admin.galeripustaka.update', $buku->id) : route('admin.galeripustaka.store') }}" 
    method="POST" 
    enctype="multipart/form-data"
>
    @csrf
    @if(isset($buku))
        @method('PUT')
    @endif

    <div class="mb-3">
        <label for="judul">Judul Buku</label>
        <input type="text" name="judul" class="form-control" required 
            value="{{ old('judul', isset($buku) ? $buku->judul : '') }}">
    </div>

    <div class="mb-3">
        <label for="penulis">Penulis</label>
        <input type="text" name="penulis" class="form-control" required 
            value="{{ old('penulis', isset($buku) ? $buku->penulis : '') }}">
    </div>

    <div class="mb-3">
        <label for="penerbit">Penerbit</label>
        <input type="text" name="penerbit" class="form-control" required 
            value="{{ old('penerbit', isset($buku) ? $buku->penerbit : '') }}">
    </div>

    <div class="mb-3">
        <label for="tahun_terbit">Tahun Terbit</label>
        <input type="number" name="tahun_terbit" class="form-control" required 
            value="{{ old('tahun_terbit', isset($buku) ? $buku->tahun_terbit : '') }}">
    </div>

    <div class="mb-3">
        <label for="stok">Jumlah Buku / Stok</label>
        <input type="number" name="stok" class="form-control" required 
            value="{{ old('stok', isset($buku) ? $buku->stok : '') }}">
    </div>

    <div class="mb-3">
        <label for="kategori">Kategori</label>
        <input type="text" name="kategori" class="form-control" required 
            value="{{ old('kategori', isset($buku) ? $buku->kategori : '') }}">
    </div>

    <div class="mb-3">
        <label for="deskripsi">Deskripsi Singkat</label>
        <textarea name="deskripsi" id="summernote" class="form-control">{!! old('deskripsi', $buku->deskripsi ?? '') !!}</textarea>
    </div>

    <div class="mb-3">
    <label for="sampul">Sampul Buku</label>
    @if(isset($buku) && $buku->sampul)
        <div class="mb-2">
            <img src="{{ asset('storage/' . $buku->sampul) }}" alt="Sampul Buku" width="150" class="img-thumbnail">
        </div>
    @endif
    <input type="file" name="sampul" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">{{ isset($buku) ? 'Update' : 'Simpan' }}</button>
</form>


@push('scripts')
<script>
    $(document).ready(function() {
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
    });
</script>
@endpush


@endsection
