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
        body {
            padding-top: 50px;
        }

        .sarpras-card {
            background-color: #f8f9fa;
            border: none;
            border-radius: 0;
            padding-bottom: 20px;
            transition: transform 0.3s ease;
            height: 100%;
            cursor: pointer;
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
            color: rgb(0, 0, 0);
            font-weight: bold;
            margin-top: 15px;
            font-size: 18px;
        }

        .section-title {
            font-weight: 700;
        }

        .modal-body img {
            max-height: 300px;
            object-fit: cover;
        }
    </style>
</head>

<body>

@include('viewpublik/layouts/navbar')

<div class="container text-center py-5">
    <h2 class="fw-bold animate__animated animate__fadeInUp">Sarana Prasarana</h2>

    <!-- Form Search -->
    <form method="GET" action="{{ route('sarpras') }}" class="row justify-content-center my-4">
        <div class="col-md-6">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Cari nama sarana atau prasarana..." value="{{ request('search') }}">
                <button class="btn btn-primary" type="submit">Cari</button>
            </div>
        </div>
    </form>

    <div class="row mt-4 g-4">
        @forelse ($data as $item)
            <div class="col-lg-3 col-md-6 col-sm-12" data-aos="fade-up">
                <div class="card sarpras-card" data-bs-toggle="modal" data-bs-target="#sarprasModal{{ $item->id }}">
                    @if($item->gambar)
                        <img src="{{ asset('storage/' . $item->gambar) }}" class="sarpras-img" alt="{{ $item->nama }}">
                    @endif
                    <div class="card-body">
                        <div class="sarpras-title">{{ $item->nama }}</div>
                    </div>
                </div>
            </div>

            <!-- Modal Detail Sarana -->
            <div class="modal fade" id="sarprasModal{{ $item->id }}" tabindex="-1" aria-labelledby="sarprasModalLabel{{ $item->id }}" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="sarprasModalLabel{{ $item->id }}">{{ $item->nama }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center mb-3">
                                @if($item->gambar)
                                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->nama }}" class="img-fluid rounded">
                                @endif
                            </div>
                            <div class="text-start">
                                {!! $item->deskripsi !!}
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-muted">Data tidak ditemukan.</p>
            </div>
        @endforelse
    </div>
</div>

@include('viewpublik.layouts.whatsapp')
@include('viewpublik/layouts/footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init();
</script>

</body>
</html>
