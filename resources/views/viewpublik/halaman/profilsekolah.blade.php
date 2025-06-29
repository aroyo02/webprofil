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
        
        .profil-img {
            max-height: 400px;
            object-fit: cover;
            border-radius: 8px;
        }
    </style>
</head>

<body>

@include('viewpublik/layouts/navbar')

    <section class="py-5">
        <div class="container">
            <div class="row align-items-center g-5">
                <!-- Gambar Profil -->
                <div class="col-md-6">
                    <img src="{{ $profil && $profil->foto_profil ? asset('storage/' . $profil->foto_profil) : asset('gambar/gedungsekolah.jpeg') }}"
                        alt="Foto Profil Sekolah"
                        class="img-fluid shadow profil-img animate__animated animate__fadeInLeft">
                </div>


                <!-- Teks Profil -->
                <div class="col-md-6">
                    <h2 class="fw-bold animate__animated animate__fadeInUp">Profil SD Negeri 1 Wirasaba</h2>
                    <p class="text-muted ">
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


@include('viewpublik/layouts/whatsapp')

@include('viewpublik/layouts/footer')

<!-- script dropdown -->

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
 
</body>
</html>