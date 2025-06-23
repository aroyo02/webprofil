<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SDN 1 Wirasaba</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        .visimisi-img {
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
                <!-- Gambar Visimisi -->
                <div class="col-md-6">
                    <img src="{{ asset('gambar/bgsekolahan.jpg') }}" alt="Gedung Sekolah"
                        class="img-fluid shadow visimisi-img animate__animated animate__fadeInLeft">
                </div>

                <!-- Teks visimisi -->
                <div class="col-md-6">
                    <h2 class="fw-bold animate__animated animate__fadeInUp">Visi Misi SD Negeri 1 Wirasaba</h2>
                    <p class="text-muted animate__animated animate__fadeInUp animate__delay-1s">
                        @if($visi)
                            {!! $visi->content !!}
                        @else
                            <span class="fst-italic">Belum ada data visi sekolah yang tersedia</span>
                        @endif
                    </p>
                    <p class="text-muted animate__animated animate__fadeInUp animate__delay-1s">
                        @if($misi)
                            {!! $misi->content !!}
                        @else
                            <span class="fst-italic">Belum ada data misi sekolah yang tersedia</span>
                        @endif
                    </p>
                </div>
            </div>
        </div>
    </section>

<!-- script dropdown -->
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>