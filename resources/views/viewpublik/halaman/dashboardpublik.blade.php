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


        .footer {
            background-color: #111;
            color: white;
            padding: 50px 20px;
            text-align: center;
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
                    <p class="animate__animated animate__fadeInUp animate__delay-1s">
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

    <!-- Statistik -->
    <section class="py-5 bg-white animate__animated animate__fadeIn">
        <div class="container">
            <div class="row text-center g-4">
                <div class="col-md-3">
                    <div class="card shadow-sm border-0 p-4" style="background-color:rgb(0, 98, 244);">
                        <h2 class="fw-bold count" style="color: white;" data-target="100">0</h2>
                        <p style="color: white;">Siswa</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow-sm border-0 p-4" style="background-color: rgb(0, 98, 244);">
                        <h2 class="fw-bold count"style="color: white;" data-target="15">0</h2>
                        <p style="color: white;">Guru</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow-sm border-0 p-4" style="background-color: rgb(0, 98, 244);">
                        <h2 class="fw-bold count" style="color: white;" data-target="3">0</h2>
                        <p style="color: white;">Ekstrakurikuler</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card shadow-sm border-0 p-4" style="background-color: rgb(0, 98, 244);">
                        <h2 class="fw-bold count" style="color: white;" data-target="4">0</h2>
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
                            <a href="#" class="btn btn-sm btn-primary mt-2">Selengkapnya</a>
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
                            <a href="#" class="btn btn-sm btn-primary mt-2">Selengkapnya</a>
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
                            <a href="#" class="btn btn-sm btn-primary mt-2">Selengkapnya</a>
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
                            <a href="#" class="btn btn-sm btn-primary mt-2">Selengkapnya</a>
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
                            <a href="#" class="btn btn-sm btn-primary mt-2">Selengkapnya</a>
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
                            <a href="#" class="btn btn-sm btn-primary mt-2">Selengkapnya</a>
                        </div>
                    </div>
                </div>

         </div>
    </div>
    </div>
    </section>

    <!-- Berita -->
    <section class="py-5 bg-light" id="berita">
        <div class="container position-relative text-center">
            <h3 class="fw-bold animate__animated animate__fadeInUp" style="padding-bottom: 50px;">Berita</h3>

            <!-- Tombol Navigasi -->
            <button class="btn btn-outline-primary position-absolute top-50 start-0 translate-middle-y z-3"
                id="scrollLeft">
                &#10094;
            </button>
            <button class="btn btn-outline-primary position-absolute top-50 end-0 translate-middle-y z-3"
                id="scrollRight">
                &#10095;
            </button>

            <!-- Wrapper Scroll -->
            <div class="d-flex gap-4 px-4" id="beritaScroll" style="overflow-x: hidden; scroll-behavior: smooth;">

                <!-- Item Berita -->
                <div class="card flex-shrink-0" style="width: 18rem; min-width: 18rem;">
                    <img src="https://via.placeholder.com/300x180" class="card-img-top" alt="Perpisahan">
                    <div class="card-body">
                        <h5 class="card-title">Perpisahan 2025</h5>
                        <small class="text-muted">19-06-2025</small>
                    </div>
                </div>
                <div class="card flex-shrink-0" style="width: 18rem; min-width: 18rem;">
                    <img src="https://via.placeholder.com/300x180" class="card-img-top" alt="Libur Semester">
                    <div class="card-body">
                        <h5 class="card-title">Libur Semester Genap</h5>
                        <small class="text-muted">19-06-2025</small>
                    </div>
                </div>
                <div class="card flex-shrink-0" style="width: 18rem; min-width: 18rem;">
                    <img src="https://via.placeholder.com/300x180" class="card-img-top" alt="Ajaran Baru">
                    <div class="card-body">
                        <h5 class="card-title">Tahun Ajaran Baru</h5>
                        <small class="text-muted">19-06-2025</small>
                    </div>
                </div>
                <div class="card flex-shrink-0" style="width: 18rem; min-width: 18rem;">
                    <img src="https://via.placeholder.com/300x180" class="card-img-top" alt="Kegiatan Sekolah">
                    <div class="card-body">
                        <h5 class="card-title">Kegiatan Sekolah</h5>
                        <small class="text-muted">18-06-2025</small>
                    </div>
                </div>
                <!-- Tambah berita lain di sini -->
                <div class="card flex-shrink-0" style="width: 18rem; min-width: 18rem;">
                    <img src="https://via.placeholder.com/300x180" class="card-img-top" alt="Kegiatan Sekolah">
                    <div class="card-body">
                        <h5 class="card-title">Lomba Classmeeting</h5>
                        <small class="text-muted">21-06-2025</small>
                    </div>
                </div>
            </div>
    </section>

    <!-- Kontak -->
    <section class="footer animate__animated animate__fadeInUp">
        <div class="container">
            <h3>Kontak</h3>
            <p>SDN 1 Wirasaba siap menjalin komunikasi yang baik dengan masyarakat. Jika memiliki pertanyaan, masukan,
                atau informasi lain, silakan hubungi kami. Kami akan memberikan respon terbaik untuk kebutuhan Anda.</p>
        </div>
    </section>
        
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
        // Scroll horizontal untuk berita
        const scrollContainer = document.getElementById("beritaScroll");
        const scrollLeft = document.getElementById("scrollLeft");
        const scrollRight = document.getElementById("scrollRight");

        scrollLeft.addEventListener("click", () => {
            scrollContainer.scrollBy({ left: -300, behavior: 'smooth' });
        });

        scrollRight.addEventListener("click", () => {
            scrollContainer.scrollBy({ left: 300, behavior: 'smooth' });
        });

        // Animasi muncul ketika kartu masuk layar
        const cards = document.querySelectorAll('#beritaScroll .card');
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add("animate__animated", "animate__fadeInUp");
                    observer.unobserve(entry.target); // jalankan sekali saja
                }
            });
        }, { threshold: 0.5 });

        cards.forEach(card => {
            observer.observe(card);
        });
    </script>

</body>
</html>