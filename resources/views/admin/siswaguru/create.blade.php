@extends('admin.layout.navbar')

@section('content')
<div class="container mt-4">
    {{-- Notifikasi Error Validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Form Siswa --}}
    <div class="card mb-4">
        <div class="card-header">
            <h5>Jumlah Siswa</h5>
        </div>
        <div class="card-body">
            <form id="form-siswa" action="{{ route('admin.siswa.store') }}" method="POST">
                @csrf
                    <input type="hidden" name="simpan_semua" id="simpan_semua_siswa" value="0">
                    <input type="number" name="jumlah_siswa" id="jumlah_siswa" class="form-control" required value="{{ old('jumlah_siswa', $siswa->jumlah_siswa ?? '') }}">
                <button type="submit" class="btn btn-primary">Simpan Jumlah Siswa</button>
            </form>
        </div>
    </div>

    {{-- Form Guru --}}
    <div class="card">
        <div class="card-header">
            <h5>{{ isset($guru) ? 'Edit Guru' : 'Tambah Guru' }}</h5>
        </div>
        <div class="card-body">
            <form id="form-guru" action="{{ isset($guru) ? route('admin.guru.update', $guru->id) : route('admin.guru.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                @if(isset($guru))
                    @method('PUT')
                @endif
                <input type="hidden" name="simpan_semua" id="simpan_semua_guru" value="0">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Guru</label>
                    <input type="text" name="nama" id="nama" class="form-control" required value="{{ old('nama', $guru->nama ?? '') }}">
                </div>

                <div class="mb-3">
                    <label for="gambar" class="form-label">Foto Guru</label>
                    <input type="file" name="gambar" id="gambar" class="form-control" {{ isset($guru) ? 'data-skip' : 'required' }}>
                    @if(isset($guru) && $guru->gambar)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $guru->gambar) }}" alt="Foto Guru" width="150" class="img-thumbnail">
                        </div>
                    @endif
                </div>

                <div class="mb-3">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" name="keterangan" id="keterangan" class="form-control" required value="{{ old('keterangan', $guru->keterangan ?? '') }}">
                </div>

                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.siswaguru.index') }}" class="btn btn-secondary">Kembali</a>
                    <button type="submit" class="btn btn-success">{{ isset($guru) ? 'Update' : 'Simpan' }}</button>
                </div>
            </form>
        </div>
    </div>
    {{-- Tombol Simpan Semua --}}
    <div class="text-end mt-4">
        <button id="btn-simpan-semua" class="btn btn-primary" disabled>Simpan Semua Data</button>
    </div>
</div>

@push('scripts')
<script>
document.addEventListener("DOMContentLoaded", function () {
    const jumlahSiswa = document.getElementById('jumlah_siswa');
    const namaGuru = document.getElementById('nama');
    const keteranganGuru = document.getElementById('keterangan');
    const gambarGuru = document.getElementById('gambar');
    const btnSimpanSemua = document.getElementById('btn-simpan-semua');

    function checkForms() {
        const siswaValid = jumlahSiswa.value.trim() !== '';
        const guruValid = namaGuru.value.trim() !== '' &&
                          keteranganGuru.value.trim() !== '' &&
                          (gambarGuru.files.length > 0 || gambarGuru.hasAttribute('data-skip'));

        btnSimpanSemua.disabled = !(siswaValid && guruValid);
    }

    jumlahSiswa.addEventListener('input', checkForms);
    namaGuru.addEventListener('input', checkForms);
    keteranganGuru.addEventListener('input', checkForms);
    gambarGuru.addEventListener('change', checkForms);

    // Trigger saat halaman dimuat
    checkForms();

    btnSimpanSemua.addEventListener('click', function () {
    document.getElementById('simpan_semua_siswa').value = 1;
    document.getElementById('simpan_semua_guru').value = 1;

    document.getElementById('form-siswa').submit();
    setTimeout(() => {
        document.getElementById('form-guru').submit();
    }, 500);
    });
});
</script>
@endpush

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

@if(session('updated'))
<script>
    Swal.fire({
        toast: true,
        position: 'top-end',
        icon: 'info',
        title: "{{ session('updated') }}",
        background: '#000080',
        color: '#ffffff',
        showConfirmButton: false,
        timer: 3000,
        timerProgressBar: true,
    });
</script>
@endif
@endsection
