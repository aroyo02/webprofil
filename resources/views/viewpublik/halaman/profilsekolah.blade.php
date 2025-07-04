<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SDN 1 Wirasaba</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        body {
            padding-top: 50px;
        }
        .profil-img, .kepsek-img {
            max-height: 400px;
            object-fit: cover;
            border-radius: 8px;
        }
    </style>
</head>
<body>

@include('viewpublik/layouts/navbar')

<!-- Judul Utama -->
<section class="pt-5 pb-3 text-center">
    <div class="container">
        <h2 class="fw-bold animate__animated animate__fadeInUp">Profil SD Negeri 1 Wirasaba</h2>
    </div>
</section>

<!-- Foto Profil Sekolah -->
<section class="pb-3">
    <div class="container text-center">
        <img src="{{ $profil && $profil->foto_profil ? asset('storage/' . $profil->foto_profil) : asset('gambar/gedungsekolah.jpeg') }}"
             alt="Foto Profil Sekolah"
             class="img-fluid shadow profil-img animate__animated animate__fadeInUp">
    </div>
</section>

<!-- Konten Profil Sekolah -->
<section class="pb-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <p class="text-muted animate__animated animate__fadeInUp">
                    @if($profil && $profil->content)
                        {!! $profil->content !!}
                    @else
                        <span class="fst-italic">Belum ada data profil sekolah yang tersedia.</span>
                    @endif
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Sambutan Kepala Sekolah -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row align-items-center g-4">
            <!-- Foto Kepala Sekolah -->
            <div class="col-md-4 text-center">
                @if($profil && $profil->foto_kepala_sekolah)
                    <img src="{{ asset('storage/' . $profil->foto_kepala_sekolah) }}" alt="Kepala Sekolah"
                         class="img-fluid shadow kepsek-img animate__animated animate__fadeInLeft">
                @else
                    <img src="{{ asset('gambar/default-kepsek.jpg') }}" alt="Foto Kepala Sekolah Default"
                         class="img-fluid shadow kepsek-img animate__animated animate__fadeInLeft">
                @endif
            </div>

            <!-- Sambutan -->
            <div class="col-md-8">
                <h4 class="fw-bold animate__animated animate__fadeInUp">Sambutan Kepala Sekolah</h4>
                <p class="text-muted animate__animated animate__fadeInUp animate__delay-1s">
                    @if($profil && $profil->sambutan_kepsek)
                        {!! $profil->sambutan_kepsek !!}
                    @else
                        <span class="fst-italic">Belum ada sambutan dari kepala sekolah yang tersedia.</span>
                    @endif
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Statistik -->
<section class="py-5 bg-white animate__animated animate__fadeIn">
    <div class="container">
        <div class="row text-center g-4">
            <div class="col-md-3">
                <div class="card shadow-sm border-0 p-4 bg-primary text-white">
                    <h2 class="fw-bold count" data-target="{{ $jumlahSiswa }}">0</h2>
                    <p>Siswa</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm border-0 p-4 bg-primary text-white">
                    <h2 class="fw-bold count" data-target="{{ $jumlahGuru }}">0</h2>
                    <p>Guru</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm border-0 p-4 bg-primary text-white">
                    <h2 class="fw-bold count" data-target="{{ $jumlahEkstrakurikuler }}">0</h2>
                    <p>Ekstrakurikuler</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card shadow-sm border-0 p-4 bg-primary text-white">
                    <h2 class="fw-bold count" data-target="{{ $jumlahSarana }}">0</h2>
                    <p>Sarpras</p>
                </div>
            </div>
        </div>
    </div>
</section>

@include('viewpublik/layouts/whatsapp')
@include('viewpublik/layouts/footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script>
    // Animasi angka berjalan
    const counters = document.querySelectorAll('.count');
    const speed = 200;

    counters.forEach(counter => {
        const updateCount = () => {
            const target = +counter.getAttribute('data-target');
            const count = +counter.innerText;
            const inc = Math.ceil(target / speed);

            if (count < target) {
                counter.innerText = count + inc;
                setTimeout(updateCount, 20);
            } else {
                counter.innerText = target;
            }
        };

        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    updateCount();
                    observer.unobserve(counter);
                }
            });
        }, { threshold: 1.0 });

        observer.observe(counter);
    });
</script>

</body>
</html>
