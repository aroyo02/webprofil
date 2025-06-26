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
        .extracuricullar-card {
            background-color:rgb(255, 255, 255);
            padding-bottom: 20px;
            transition: transform 0.3s ease;
            height: 100%;
            border: 2px solid #eee;
            border-radius: 6px;
        }

        .extracuricullar-card:hover {
            transform: scale(1.02);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.08);
        }

        .extracuricullar-img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .extracuricullar-desc {
            font-size: 15px;
            color: #555;
            padding: 0 10px;
        }

    </style>
</head>

<body>

@include('viewpublik/layouts/navbar')

    <div class="container text-center py-5">
        <h2 class="fw-bold animate__animated animate__fadeInUp">Ekstrakurikuler</h2>

        <div class="row mt-4 g-4">
             @foreach($ekstrakurikuler as $item)
            <div class="col-lg-3 col-md-6 col-sm-12" data-aos="fade-up">
                <div class="card extracuricullar-card">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        @if($item->logo)
                            <img src="{{ asset('storage/' . $item->logo) }}" alt="{{ $item->nama }}" class="mb-3 rounded-3" style="width: 100px; height: 100px; object-fit: cover;">
                        @endif
                        <h5 class="card-title fw-semibold">{{ $item->nama }}</h5>
                        <button class="btn btn-outline-info btn-sm mt-2" data-bs-toggle="modal" data-bs-target="#modalDeskripsi{{ $item->id }}">
                            Detail
                        </button>
                    </div>
                </div>
            </div>

            <!-- Modal Deskripsi -->
            <div class="modal fade" id="modalDeskripsi{{ $item->id }}" tabindex="-1" aria-labelledby="modalDeskripsiLabel{{ $item->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content rounded-4">
                        <div class="modal-header border-0">
                            <h5 class="modal-title" id="modalDeskripsiLabel{{ $item->id }}">{{ $item->nama }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row align-items-center">
                                <div class="col-md-5 text-center mb-3 mb-md-0">
                                    @if($item->logo)
                                        <img src="{{ asset('storage/' . $item->logo) }}" alt="{{ $item->nama }}" class="img-fluid rounded-3" style="max-height: 200px; object-fit: cover;">
                                    @endif
                                </div>
                                <div class="col-md-7">
                                    <p class="mb-0">{{ $item->deskripsi }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer border-0">
                            <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Tutup</button>
                        </div>
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