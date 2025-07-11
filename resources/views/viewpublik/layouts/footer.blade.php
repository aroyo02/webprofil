<style>
    footer {
        background-color: #1f2d3d;
    }

    footer h5 {
        color: #fff;
        margin-bottom: 20px;
    }

    footer ul li a {
        color: #fff;
        text-decoration: none;
        transition: color 0.3s;
    }

    footer ul li a:hover {
        color: #f8f9fa;
    }

    footer hr {
        border-color: #3c4b5c;
    }
</style>

<footer class="pt-5 pb-3 text-white">
    <div class="container">
        <div class="row">
            <!-- Logo dan Nama -->
            <div class="col-lg-3 mb-4">
                <img src="{{ $profil && $profil->logo ? asset('storage/' . $profil->logo) : asset('gambar/logo.png') }}" alt="" class="mb-3" style="max-width: 80px;">
                <h4 class="text-white">SD Negeri 1 Wirasaba</h4>
                <hr class="text-secondary">
            </div>

            <!-- Menu Navigasi -->
            <div class="col-6 col-lg-3 mb-4">
                <h5 class="fw-bold">Menu</h5>
                <ul class="list-unstyled">
                    <li><a href="/">Dashboard</a></li>
                    <li><a href="{{ route('profilsekolah') }}">Profil Sekolah</a></li>
                    <li><a href="{{ route('visimisi') }}">Visi Misi</a></li>
                    <li><a href="{{ route('strukturorganisasi') }}">Struktur Organisasi</a></li>
                    <li><a href="{{ route('daftarguru') }}">Daftar Guru</a></li>
                    <li><a href="{{ route('sarpras') }}">Sarana Prasarana</a></li>
                </ul>
            </div>

            <!-- Informasi -->
            <div class="col-6 col-lg-3 mb-4">
                <h5 class="fw-bold">Informasi</h5>
                <ul class="list-unstyled">
                    <li><a href="{{ route('ekskul') }}">Ekstrakurikuler</a></li>
                    <li><a href="{{ route('prestasi') }}">Prestasi</a></li>
                    <li><a href="{{ route('galeri') }}">Galeri Kegiatan</a></li>
                    <li><a href="{{ route('galeripustakapublik') }}">Galeri Pustaka</a></li>
                    <li><a href="{{ route('berita.publik') }}">Berita</a></li>
                </ul>
            </div>

            <!-- Kontak -->
            <div class="col-12 col-lg-3 mb-4">
                <h5 class="fw-bold">Kontak</h5>
                <ul class="list-unstyled">
                    <li> {{ $kontak->alamat ?? 'Alamat belum tersedia' }}</li>
                    <li>Email: <a class="text-white">{{ $kontak->email ?? '-' }}</a></li>
                    <li>Telp: {{ $kontak->telepon ?? '-' }}</li>
                </ul>
            </div>
        </div>

        <hr class="text-secondary">

        <div class="text-center">
            <small>Developed By Fourdan & Aroyo</small>
        </div>
    </div>
</footer>
