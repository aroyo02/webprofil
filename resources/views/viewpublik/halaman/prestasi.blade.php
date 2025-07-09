<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Prestasi - SDN 1 Wirasaba</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

  <style>
    body {
      background-color: #f9f9f9;
      padding-top: 50px;
    }

    .prestasi-card {
      background-color: #ffffff;
      border: none;
      border-radius: 12px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
      transition: all 0.3s ease;
      padding: 30px 20px;
      height: 100%;
    }

    .prestasi-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }

    .prestasi-img {
      width: 110px;
      height: 110px;
      object-fit: cover;
      border-radius: 12px;
      margin-bottom: 15px;
    }

    .card-title {
      font-size: 1.1rem;
      font-weight: 600;
      margin-bottom: 10px;
      color: #333;
    }

    .btn-outline-info {
      border-radius: 50px;
      padding: 5px 16px;
      font-size: 0.9rem;
    }

    .modal-content {
      border-radius: 16px;
    }

    .modal-body img {
      border-radius: 10px;
    }

    @media (max-width: 768px) {
      .prestasi-img {
        width: 100px;
        height: 100px;
      }

      .modal-body .row {
        flex-direction: column;
      }

      .modal-body .col-md-5,
      .modal-body .col-md-7 {
        text-align: center;
      }
    }
  </style>
</head>

<body>

  @include('viewpublik/layouts/navbar')

  <div class="container text-center py-5">
    <h2 class="fw-bold animate__animated animate__fadeInUp">Prestasi</h2>

    <!-- Form Pencarian -->
    <form method="GET" action="{{ route('prestasi') }}" class="d-flex justify-content-center mt-3 mb-4">
      <div class="input-group" style="max-width: 400px;">
        <input type="text" name="search" class="form-control" placeholder="Cari prestasi..." value="{{ request('search') }}">
        <button class="btn btn-primary" type="submit">Cari</button>
      </div>
    </form>

    <div class="row mt-4 g-4">
      @forelse($prestasi as $item)
      <div class="col-lg-3 col-md-6 col-sm-12" data-aos="fade-up">
        <div class="card prestasi-card d-flex align-items-center justify-content-center text-center">
          @if($item->gambar)
          <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="prestasi-img">
          @endif
          <h5 class="card-title">{{ $item->judul }}</h5>
          <button class="btn btn-outline-info btn-sm mt-2" data-bs-toggle="modal" data-bs-target="#modalDeskripsi{{ $item->id }}">
            Detail
          </button>
        </div>
      </div>

      <!-- Modal Deskripsi -->
      <div class="modal fade" id="modalDeskripsi{{ $item->id }}" tabindex="-1" aria-labelledby="modalDeskripsiLabel{{ $item->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-header border-0">
              <h5 class="modal-title" id="modalDeskripsiLabel{{ $item->id }}">{{ $item->judul }}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Tutup"></button>
            </div>
            <div class="modal-body text-center">
                  @if($item->gambar)
                  <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" class="img-fluid" style="max-height: 200px; object-fit: cover;">
                  @endif
                <div class="text-start">
                  <p>{!! $item->deskripsi !!}</p>
                </div>
            </div>
            <div class="modal-footer border-0">
              <button type="button" class="btn btn-secondary rounded-pill" data-bs-dismiss="modal">Tutup</button>
            </div>
          </div>
        </div>
      </div>
      @empty
      <div class="col-12">
        <p class="text-muted">Data prestasi tidak ditemukan.</p>
      </div>
      @endforelse
    </div>
  </div>

  @include('viewpublik.layouts.whatsapp')
  @include('viewpublik/layouts/footer')

  <!-- Script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>
</body>

</html>
