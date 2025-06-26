<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SDN 1 Wirasaba</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        .sarpras-card {
            background-color: #f8f9fa;
            border: none;
            border-radius: 0;
            padding-bottom: 20px;
            transition: transform 0.3s ease;
            height: 100%;
        }

        .sarpras-card:hover {
            transform: scale(1.02);
        }

        .sarpras-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .sarpras-title {
            color:rgb(0, 0, 0);
            font-weight: bold;
            margin-top: 15px;
            font-size: 18px;
        }

        .sarpras-desc {
            font-size: 15px;
            color: #555;
            padding: 0 10px;
        }

        .section-title {
            font-weight: 700;
        }

    </style>
</head>

<body>

@include('viewpublik/layouts/navbar')

    <div class="container text-center py-5">
        <h2 class="fw-bold animate__animated animate__fadeInUp">Sarana Prasarana</h2>

        <div class="row mt-4 g-4">
            @foreach ($data as $item)
            <div class="col-lg-3 col-md-6 col-sm-12" data-aos="fade-up">
                <div class="card sarpras-card">
                    @if($item->gambar)
                        <img src="{{ asset('storage/' . $item->gambar) }}" class="sarpras-img" alt="{{ $item->nama }}">
                    @endif
                    <div class="card-body">
                        <div class="sarpras-title">{{ $item->nama }}</div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>

@include('viewpublik/layouts/footer')

    <!-- Bootstrap + AOS JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>
</html>