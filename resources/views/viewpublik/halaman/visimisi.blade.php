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
            padding-top: 70px;
        }

        .visimisi-section {
            padding-top: 40px;
            padding-bottom: 60px;
        }

        .visimisi-box {
            background-color: #ffffff;
            border: 2px solid #f0f0f0;
            border-radius: 8px;
            padding: 30px;
            height: 100%;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.03);
            transition: transform 0.3s;
        }

        .visimisi-box:hover {
            transform: translateY(-5px);
        }

        .visimisi-title {
            font-weight: bold;
            margin-bottom: 20px;
            color:rgb(0, 0, 0);
        }

        .visimisi-content {
            color: #555;
            font-size: 1rem;
        }
    </style>
</head>

<body>

@include('viewpublik/layouts/navbar')

<!-- Judul Halaman -->
<section class="text-center pt-4 pb-2">
    <div class="container">
        <h2 class="fw-bold animate__animated animate__fadeInUp">Visi Misi SD Negeri 1 Wirasaba</h2>
    </div>
</section>

<!-- Konten Visi & Misi -->
<section class="visimisi-section">
    <div class="container">
        <div class="row g-4 row-cols-1 row-cols-md-2">
            <!-- Visi -->
            <div class="col animate__animated animate__fadeInLeft">
                <div class="visimisi-box">
                    <h4 class="visimisi-title">Visi</h4>
                    <div class="visimisi-content">
                        @if($visi)
                            {!! $visi->content !!}
                        @else
                            <span class="fst-italic text-muted">Belum ada data visi sekolah yang tersedia</span>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Misi -->
            <div class="col animate__animated animate__fadeInRight">
                <div class="visimisi-box">
                    <h4 class="visimisi-title">Misi</h4>
                    <div class="visimisi-content">
                        @if($misi)
                            {!! $misi->content !!}
                        @else
                            <span class="fst-italic text-muted">Belum ada data misi sekolah yang tersedia</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@include('viewpublik.layouts.whatsapp')
@include('viewpublik/layouts/footer')

<!-- Script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
