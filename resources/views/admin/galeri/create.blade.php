@extends('admin.layout.navbar')

@section('content')
<h1>{{ isset($edit) ? 'Edit Galeri' : 'Tambah Galeri' }}</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if(isset($edit))
{{-- Form Edit --}}
<form action="{{ route('admin.galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')

    <div class="form-group mb-3">
        <label>Judul</label>
        <input type="text" name="judul" class="form-control" value="{{ old('judul', $galeri->judul) }}" required>
    </div>

    <div class="form-group mb-3">
        <label>File Saat Ini</label><br>
        @if ($galeri->tipe === 'image')
            <img src="{{ asset('storage/galeri/' . $galeri->file) }}" width="200">
        @else
            <video width="250" controls>
                <source src="{{ asset('storage/galeri/' . $galeri->file) }}" type="video/mp4">
            </video>
        @endif
    </div>

    <div class="form-group mb-3">
        <label>Ganti File (opsional)</label>
        <input type="file" name="file" class="form-control">
    </div>

    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary">Kembali</a>
</form>

@else
{{-- Form Tambah (Multiple Upload) --}}
<form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div id="upload-wrapper">
        <div class="upload-item border rounded p-3 mb-3">
            <div class="mb-3">
                <label>Judul</label>
                <input type="text" name="judul[]" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>File (Gambar/Video)</label>
                <input type="file" name="files[]" class="form-control" required>
            </div>
            <button type="button" class="btn btn-danger btn-sm remove-upload">Hapus Form</button>
        </div>
    </div>

    <button type="button" class="btn btn-secondary mb-3" id="add-upload">+ Tambah Form</button><br>

    <div class="text-end">
        <button type="submit" class="btn btn-primary">Upload</button>
    </div>

</form>
@endif

{{-- SweetAlert --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if(session('success'))
<script>
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'success',
        title: "{{ session('success') }}",
        background: '#006400',
        color: '#ffffff',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
    });
</script>
@endif
@if(session('deleted'))
<script>
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'error',
        title: "{{ session('deleted') }}",
        background: '#721c24',
        color: '#ffffff',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
    });
</script>
@endif

{{-- JS Dinamis Form Upload --}}
@if(!isset($edit))
<script>
    const maxForms = 5;
    document.getElementById('add-upload').addEventListener('click', function () {
        const wrapper = document.getElementById('upload-wrapper');
        const count = wrapper.querySelectorAll('.upload-item').length;

        if (count >= maxForms) {
            Swal.fire({
                icon: 'warning',
                title: 'Maksimal 5 Form',
                text: 'Anda hanya bisa menambahkan maksimal 5 file sekaligus.',
                confirmButtonColor: '#3085d6',
            });
            return;
        }

        const newItem = document.createElement('div');
        newItem.classList.add('upload-item', 'border', 'rounded', 'p-3', 'mb-3');
        newItem.innerHTML = `
            <div class="mb-3">
                <label>Judul</label>
                <input type="text" name="judul[]" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>File (Gambar/Video)</label>
                <input type="file" name="files[]" class="form-control" required>
            </div>
            <button type="button" class="btn btn-danger btn-sm remove-upload">Hapus Form</button>
        `;

        wrapper.appendChild(newItem);
    });

    document.addEventListener('click', function (e) {
        if (e.target.classList.contains('remove-upload')) {
            const item = e.target.closest('.upload-item');
            item.remove();
        }
    });
</script>
@endif
@endsection
