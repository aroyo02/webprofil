<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Berita - SDN 1 Wirasaba</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- AOS CSS -->
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <style>
        .card-berita {
            border: none;
            transition: all 0.3s ease;
            height: 100%;
        }

        .card-berita:hover {
            transform: translateY(-5px);
            box-shadow: 0 4px 16px rgba(0,0,0,0.1);
        }

        .card-berita img {
            width: 100%;
            height: 200px;
            object-fit: cover;
            border-radius: 6px 6px 0 0;
        }

        .berita-title {
            font-size: 22px;
            font-weight: 600;
            color: #333;
            margin-top: 10px;
        }

        .berita-date {
            font-size: 0.85rem;
            color: #777;
        }
    </style>
</head>
<body>

@include('viewpublik.layouts.navbar')

<div class="container py-5">
    <h2 class="fw-bold text-center mb-4" data-aos="fade-up">Berita Terbaru</h2>

    <div class="row g-4">
        @foreach ($beritas as $berita)
        <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
            <a href="{{ route('berita.showpublik', $berita->id) }}" class="text-decoration-none">
                <div class="card card-berita">
                    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}">
                    <div class="card-body text-center">
                        <div class="berita-title">{{ Str::limit($berita->judul, 80) }}</div>
                        <div class="berita-date mt-1">{{ \Carbon\Carbon::parse($berita->created_at)->format('d M Y') }}</div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>

@include('viewpublik/layouts/footer')

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 800,
        once: true,
    });
</script>

</body>
</html>
