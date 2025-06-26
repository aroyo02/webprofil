<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SDN 1 Wirasaba</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        .hero-section {
            background: url('gambar/bgsekolahan.jpg') center center / cover no-repeat;
            color: white;
            text-align: center;
            padding: 100px 0;
            position: relative;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-shadow: 1px 1px 5px rgba(0, 0, 0, 0.6);
        }

        .hero-section::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.4);
            /* Gelap transparan agar teks tetap terbaca */
            z-index: 1;
        }

        .hero-section .container {
            position: relative;
            z-index: 2;
        }

        .hero-overlay {
            z-index: 2;
            padding: 20px;
            max-width: 900px;
        }

        .hero-section h1 {
            font-size: 3rem;
            margin-bottom: 1rem;
        }

        .hero-section p.lead {
            font-size: 1.3rem;
        }

        .transisi {
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 100%;
            z-index: 2;
        }

        .transisi img {
            margin-bottom: -68px;
            display: block;
            width: 100%;
            height: auto;
            position: relative;
        }

        .profil-img {
            max-height: 400px;
            object-fit: cover;
            border-radius: 8px;
        }

        /* Background pola */
        .informasi-section {
            background-image: url('gambar/infolainnya.jpeg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            padding-top: 80px;
            padding-bottom: 80px;
        }

        /* Card gaya */
        .informasi-card {
            border: none;
            border-top: 5px solid #0d6efd; /* biru bootstrap */
            border-radius: 10px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .informasi-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .informasi-card h6 {
            font-weight: 600;
            margin-top: 10px;
        }

         .berita-card {
        transition: transform 0.3s ease;
    }

    .berita-card:hover {
        transform: scale(1.03);
    }

    .berita-card .overlay {
        transition: transform 0.3s ease, background-color 0.3s ease;
    }

    .berita-card:hover .overlay {
        transform: translateY(-5px);
        background-color: rgba(0, 0, 0, 0.6);
    }

    .berita-tanggal {
        background-color: rgba(113, 113, 113, 0.71); /* Bootstrap Primary dengan sedikit transparansi */
        font-size: 0.75rem;
        font-weight: 500;
        letter-spacing: 0px;
    }

    .beritaScroll::-webkit-scrollbar {
        display: none;
    }

    @media (max-width: 768px) {
    /* Sembunyikan tombol panah di layar kecil */
    .btn-scroll {
        display: none !important;
    }
    }


    </style>
</head>

<body>

    @include('viewpublik/layouts/navbar')
    
    <!-- Hero Section -->
    <section class="hero-section text-white text-center">
        <div class="container animate__animated animate__fadeInUp">
            <h1 class="fw-bold">SD Negeri 1 Wirasaba</h1>
            <p class="lead">“Dari ruang kelas sederhana, tempat di mana setiap langkah kecil anak hari ini akan menjadi
                pijakan kuat bagi masa depan Indonesia yang lebih baik.”</p>
        </div>
    </section>

    <div class="transisi">
        <img src="{{ asset('gambar/transisi.png') }}" class="img-fluid w-100">
    </div>

    <!-- Profil Sekolah -->
    <section class="py-5 bg-white animate__animated animate__fadeInUp">
        <div class="container">
            <div class="row align-items-center g-5">
                <!-- Gambar Profil -->
                <div class="col-md-6">
                    <img src="{{ asset('gambar/bgsekolahan.jpg') }}" alt="Gedung Sekolah"
                        class="img-fluid shadow profil-img animate__animated animate__fadeInLeft">
                </div>

                <!-- Teks Profil -->
                <div class="col-md-6">
                    <h2 class="fw-bold animate__animated animate__fadeInUp">Profil SD Negeri 1 Wirasaba</h2>
                    <p class="text-muted animate__animated animate__fadeInUp animate__delay-1s">
                        @if($profil)
                            {!! $profil->content !!}
                        @else
                            <span class="fst-italic">Belum ada data profil sekolah yang tersedia.</span>
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-white animate__animated animate__fadeIn">
        <div class="container">
            <div class="row text-center g-4">
                <div class="col-md-3">
                    <div class="card shadow-sm border-0 p-4" style="background-color:rgb(0, 98, 244);">
                        <h2 class="fw-bold count" style="color: white;" data-target="{{ $jumlahSiswa }}">0</h2>
                        <p style="color: white;">Siswa</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow-sm border-0 p-4" style="background-color: rgb(0, 98, 244);">
                        <h2 class="fw-bold count"style="color: white;" data-target="{{ $jumlahGuru }}">0</h2>
                        <p style="color: white;">Guru</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow-sm border-0 p-4" style="background-color: rgb(0, 98, 244);">
                        <h2 class="fw-bold count" style="color: white;" data-target="{{ $jumlahEkstrakurikuler }}">0</h2>
                        <p style="color: white;">Ekstrakurikuler</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow-sm border-0 p-4" style="background-color: rgb(0, 98, 244);">
                        <h2 class="fw-bold count" style="color: white;" data-target="{{ $jumlahSarana }}">0</h2>
                        <p style="color: white;">Sarpras</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Informasi Lainnya -->
    <section class="informasi-section">
    <div class="overlay">
    <div class="container text-center">
        <h3 class="fw-bold animate__animated animate__fadeInUp" style="padding-bottom: 50px;">Informasi Lainnya</h3>
        <div class="row g-4 justify-content-center">

                <!-- Visi Misi -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card h-100 p-3 shadow-sm informasi-card">
                        <img src="https://img.icons8.com/color/96/goal.png" class="card-img-top mx-auto"
                            style="width:60px" alt="Visi Misi">
                        <div class="card-body">
                            <h6 class="card-title">Visi Misi</h6>
                            <a href="{{ route('visimisi') }}" class="btn btn-sm btn-primary mt-2">Selengkapnya</a>
                        </div>
                    </div>
                </div>

                <!-- Daftar Guru -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card h-100 p-3 shadow-sm informasi-card">
                        <img src="https://img.icons8.com/color/96/teacher.png" class="card-img-top mx-auto"
                            style="width:60px" alt="Daftar Guru">
                        <div class="card-body">
                            <h6 class="card-title">Daftar Guru</h6>
                            <a href="{{ route('daftarguru') }}" class="btn btn-sm btn-primary mt-2">Selengkapnya</a>
                        </div>
                    </div>
                </div>

                <!-- Struktur Organisasi -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card h-100 p-3 shadow-sm informasi-card">
                        <img src="https://img.icons8.com/color/96/organization.png" class="card-img-top mx-auto"
                            style="width:60px" alt="Struktur Organisasi">
                        <div class="card-body">
                            <h6 class="card-title">Struktur Organisasi</h6>
                            <a href="{{ route('strukturorganisasi') }}" class="btn btn-sm btn-primary mt-2">Selengkapnya</a>
                        </div>
                    </div>
                </div>

                <!-- Ekstrakurikuler -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card h-100 p-3 shadow-sm informasi-card">
                        <img src="https://img.icons8.com/color/96/basketball.png" class="card-img-top mx-auto"
                            style="width:60px" alt="Ekstrakurikuler">
                        <div class="card-body">
                            <h6 class="card-title">Ekstrakurikuler</h6>
                            <a href="{{ route('ekskul') }}" class="btn btn-sm btn-primary mt-2">Selengkapnya</a>
                        </div>
                    </div>
                </div>

                <!-- Sarpras -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card h-100 p-3 shadow-sm informasi-card">
                        <img src="https://img.icons8.com/color/96/school-building.png" class="card-img-top mx-auto"
                            style="width:60px" alt="Sarpras">
                        <div class="card-body">
                            <h6 class="card-title">Sarpras</h6>
                            <a href="{{ route('sarpras') }}" class="btn btn-sm btn-primary mt-2">Selengkapnya</a>
                        </div>
                    </div>
                </div>

                <!-- Galeri -->
                <div class="col-lg-4 col-md-6 col-12">
                    <div class="card h-100 p-3 shadow-sm informasi-card">
                        <img src="https://img.icons8.com/color/96/image-gallery.png" class="card-img-top mx-auto"
                            style="width:60px" alt="Galeri">
                        <div class="card-body">
                            <h6 class="card-title">Galeri</h6>
                            <a href="{{ route('galeri') }}" class="btn btn-sm btn-primary mt-2">Selengkapnya</a>
                        </div>
                    </div>
                </div>

         </div>
    </div>
    </div>
    </section>

    <!-- Berita -->
<section class="py-5 bg-light position-relative" id="berita">
    <div class="container text-center">
        <h3 class="fw-bold animate__animated animate__fadeInUp mb-5">Berita</h3>

        <!-- Tombol navigasi scroll -->
        <button onclick="scrollBerita('left')" 
        class="btn btn-primary position-absolute top-50 translate-middle-y z-1"style="left: 5rem;">&lt;
        </button>

        <button onclick="scrollBerita('right')" 
        class="btn btn-primary position-absolute top-50 translate-middle-y z-1" style="right: 5rem;">&gt;
        </button>


        <!-- Wrapper Scroll -->
        <div id="beritaScroll"
         class="d-flex gap-4 px-4 overflow-auto"
         style="scroll-behavior: smooth; overflow-y: hidden; scrollbar-width: none; -ms-overflow-style: none;">
    
        @foreach($beritas as $berita)
        <a href="{{ route('berita.showpublik', $berita->id) }}" class="text-decoration-none text-white">
            <div class="berita-card position-relative flex-shrink-0 rounded-4 overflow-hidden shadow"
                 style="min-width: 18rem; height: 250px; background-image: url('{{ asset('storage/' . $berita->gambar) }}'); background-size: cover; background-position: center;">
                
                <!-- Tanggal -->
                <div class="position-absolute top-0 start-0 berita-tanggal px-3 py-1 rounded-end mt-2 ms-2 text-white">
                    {{ \Carbon\Carbon::parse($berita->created_at)->format('d M Y') }}
                </div>
    
                <!-- Overlay Judul -->
                <div class="overlay position-absolute bottom-0 w-100 px-3 py-2" style="background: rgba(0, 0, 0, 0.5);">
                    <h5 class="text-white m-0">{{ $berita->judul }}</h5>
                </div>
            </div>
        </a>
        @endforeach
    </div>


        <!-- Tombol Lihat Semua -->
        <div class="mt-4">
            <a href="{{ route('berita.publik') }}" class="btn btn-outline-primary">
                Lihat Semua Berita →
            </a>
        </div>
    </div>
</section>


<section id="contact" class="py-5">
    <div class="container">
        <!-- Judul -->
        <h2 class="text-center fw-bold mb-2" data-aos="fade-up">Kontak</h2>
        <p class="text-center mb-5 text-black" data-aos="fade-up" data-aos-delay="100">
            Terima kasih telah mengunjungi website SDN 1 Wirasaba. Kami siap membantu dan menjawab segala pertanyaan Anda terkait kegiatan sekolah, dan informasi lainnya. Kami siap menjalin komunikasi yang baik dengan masyarakat, siswa, dan orangtua. Jika Anda memiliki pertanyaan, masukan, atau informasi
            yang ingin disampaikan, silakan hubungi kami melalui media yang tersedia di bawah ini. Kami akan berusaha memberikan respon terbaik untuk kebutuhan Anda.
        </p>

        <div class="row align-items-center">
            <!-- Embed Google Map -->
            <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right" data-aos-duration="1200">
                <div class="map-frame">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.1100067412!2d109.4175892745488!3d-7.453080673451991!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6550e6fd8c3555%3A0xf322366af535cbb8!2sSD%20Negeri%20Wirasaba%201!5e0!3m2!1sid!2sid!4v1750912401340!5m2!1sid!2sid"
                        width="100%" height="300" style="border-radius: 8px;;" allowfullscreen="" loading="lazy">
                    </iframe>
                </div>
            </div>

            <!-- Contact Information -->
            <div class="col-lg-6" data-aos="fade-left" data-aos-duration="1200">
                <div class="contact-info text-black">
                    <h5 class="fw-bold mb-2">Alamat Sekolah</h5>
                    <p>Jl. Veteran, Kutorejo, Jetis, Kec. Sukoharjo, Kabupaten Sukoharjo, Jawa Tengah 57511</p>

                    <h5 class="fw-bold mt-4 mb-2">Nomor Telepon</h5>
                    <p>(021) 593023</p>

                    <h5 class="fw-bold mt-4 mb-2">Email</h5>
                    <p>konisukoharjo@yahoo.com</p>

                </div>
            </div>
        </div>
    </div>
</section>

    @include('viewpublik/layouts/footer')
        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Animasi angka berjalan
        const counters = document.querySelectorAll('.count');
        const speed = 200; // Semakin kecil = lebih cepat

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

            // Jalankan ketika terlihat di layar
            const observer = new IntersectionObserver(entries => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        updateCount();
                        observer.unobserve(counter); // Hanya sekali
                    }
                });
            }, { threshold: 1.0 });

            observer.observe(counter);
        });
    </script>

    <script>
    function scrollBerita(direction) {
        const container = document.getElementById('beritaScroll');
        const scrollAmount = 300;

        if (direction === 'left') {
            container.scrollBy({ left: -scrollAmount, behavior: 'smooth' });
        } else {
            container.scrollBy({ left: scrollAmount, behavior: 'smooth' });
        }
        }
    </script>


</body>
</html>