@extends('admin.layout.navbar')

@section('content')
<div class="container mt-4">
    <div class="row">
        <div class="col-md-12">
            <h2 class="mb-4">{{ $berita ? 'Edit Berita' : 'Tambah Berita' }}</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ $berita ? route('admin.berita.update', $berita->id) : route('admin.berita.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if($berita)
                    @method('PUT')
                @endif

                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Berita</label>
                    <input type="text" name="judul" id="judul" class="form-control" value="{{ old('judul', $berita->judul ?? '') }}" required>
                </div>

                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" id="summernote" class="form-control" required>{{ old('deskripsi', $berita->deskripsi ?? '') }}</textarea>
                </div>
                
                <div class="mb-3">
                    <label for="gambar" class="form-label">Upload Gambar</label>
                    <input type="file" name="gambar" id="gambar" class="form-control" {{ $berita ? '' : 'required' }}>
                    @if($berita && $berita->gambar)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar berita" class="img-thumbnail" width="200">
                        </div>
                    @endif
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.berita.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">{{ $berita ? 'Update' : 'Simpan' }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
    $(document).ready(function() {
        $('#summernote').summernote({
            placeholder: 'Tulis deskripsi berita di sini...',
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
