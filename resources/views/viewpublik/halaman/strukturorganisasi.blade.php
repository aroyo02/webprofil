<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Struktur Organisasi - SDN 1 Wirasaba</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
  <style>
    body {
      background-color: #f9f9f9;
      padding-top: 50px;
    }

    .struktur-img {
      max-width: 100%;
      height: auto;
      max-height: 700px;
      margin-top: 30px;
      cursor: pointer;
      border-radius: 10px;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
      transition: transform 0.3s ease;
    }

    .struktur-img:hover {
      transform: scale(1.02);
    }

    .modal-img-wrapper {
      position: relative;
      display: inline-block;
    }

    .modal-img {
      max-width: 100%;
      max-height: 90vh;
      border-radius: 10px;
    }

    .modal-close-btn {
      position: absolute;
      top: 10px;
      right: 10px;
      font-size: 1.5rem;
      color: white;
      background: rgba(0, 0, 0, 0.6);
      border: none;
      border-radius: 50%;
      width: 35px;
      height: 35px;
      text-align: center;
      line-height: 30px;
      cursor: pointer;
      z-index: 10;
    }

    .modal-close-btn:hover {
      background: rgba(0, 0, 0, 0.8);
    }

    .modal-content {
      background: transparent;
      border: none;
      text-align: center;
    }

    .modal-dialog {
      max-width: 95%;
    }

    @media (max-width: 768px) {
      .modal-close-btn {
        font-size: 1.2rem;
        width: 30px;
        height: 30px;
      }
    }
  </style>
</head>

<body>

  @include('viewpublik.layouts.navbar')

  <section class="py-5">
    <div class="container text-center">
      <h2 class="fw-bold animate__animated animate__fadeInUp">Struktur Organisasi SD Negeri 1 Wirasaba</h2>

      @if ($struktur && $struktur->image)
        <div class="d-flex justify-content-center" data-aos="zoom-in" data-aos-duration="800">
          <img src="{{ asset('storage/' . $struktur->image) }}" alt="Struktur Organisasi"
               class="img-fluid struktur-img"
               data-bs-toggle="modal" data-bs-target="#gambarModal">
        </div>
      @else
        <p class="text-muted fst-italic mt-4">Belum ada data struktur organisasi yang tersedia.</p>
      @endif
    </div>
  </section>

  <!-- Modal Zoom -->
@if ($struktur?->image)
  <div class="modal fade" id="gambarModal" tabindex="-1" aria-labelledby="gambarModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
          <div class="modal-img-wrapper">
            <!-- Tombol Close -->
            <button type="button" class="modal-close-btn" data-bs-dismiss="modal" aria-label="Close">&times;</button>
            <img src="{{ asset('storage/' . $struktur->image) }}" alt="Struktur Organisasi"
                 class="modal-img" id="zoomableImage">
          </div>
        </div>
      </div>
    </div>
  </div>
@endif


  @include('viewpublik.layouts.whatsapp')
  @include('viewpublik/layouts/footer')

  <!-- Script -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init();

    // Zoom via scroll
    const img = document.getElementById('zoomableImage');
    let scale = 1;
    img?.addEventListener('wheel', function (e) {
      e.preventDefault();
      if (e.deltaY < 0) {
        scale += 0.1;
      } else {
        scale = Math.max(1, scale - 0.1);
      }
      img.style.transform = `scale(${scale})`;
    });

    const modal = document.getElementById('gambarModal');
    modal?.addEventListener('hidden.bs.modal', function () {
      scale = 1;
      img.style.transform = 'scale(1)';
    });
  </script>
</body>
</html>
