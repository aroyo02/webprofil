<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $berita->judul }} - SDN 1 Wirasaba</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        .berita-detail-img {
            width: 100%;
            max-height: 450px;
            object-fit: cover;
            border-radius: 8px;
        }
        .berita-tanggal {
            font-size: 0.9rem;
            color: gray;
        }
    </style>
</head>

<body>

@include('viewpublik.layouts.navbar')

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">

            <h2 class="fw-bold mb-3">{{ $berita->judul }}</h2>
            <p class="berita-tanggal">🗓 {{ \Carbon\Carbon::parse($berita->created_at)->format('d M Y') }}</p>

            @if($berita->gambar)
                <img src="{{ asset('storage/' . $berita->gambar) }}" alt="Gambar Berita" class="berita-detail-img mb-4">
            @endif

            <div class="fs-5">
                {!! $berita->deskripsi !!}
            </div>

        </div>
    </div>
</div>

@include('viewpublik/layouts/footer')

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
