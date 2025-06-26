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

    .gallery-img {
      width: 100%;
      height: 220px;
      object-fit: cover;
      border-radius: 4px;
      border: 4px solid #f0f0f0;
      transition: transform 0.3s ease;
    }

    .gallery-img:hover {
      transform: scale(1.03);
    }

    .gallery-title {
      font-weight: 700;
    }

    .gallery-subtitle {
      color: #2ecc71;
      letter-spacing: 1px;
      font-size: 14px;
      font-weight: bold;
    }
    </style>
</head>

<body>
@include('viewpublik/layouts/navbar')

<div class="container text-center py-5">
  <h2 class="gallery-title mb-4 animate__animated animate__fadeInUp">Galeri Sekolah</h2>

  <div class="row g-3">
    @foreach($galeris as $galeri)
    <div class="col-md-4 col-sm-6" data-aos="fade-up" data-aos-delay="100">
        @if($galeri->tipe === 'image')
            <img 
                src="{{ asset('storage/galeri/' . $galeri->file) }}" 
                class="img-fluid cursor-pointer" 
                alt="gambar" 
                data-bs-toggle="modal" 
                data-bs-target="#modalImage"
                data-img="{{ asset('storage/galeri/' . $galeri->file) }}"
            >
        @else
            <video width="100%" controls>
                <source src="{{ asset('storage/galeri/' . $galeri->file) }}" type="video/mp4">
                Browser tidak mendukung video.
            </video>
        @endif
    </div>
    @endforeach
  </div>
</div>

<!-- Modal Bootstrap -->
<div class="modal fade" id="modalImage" tabindex="-1" aria-labelledby="modalImageLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-body p-0">
                <img id="modalImagePreview" src="" class="img-fluid w-100" alt="Preview">
            </div>
        </div>
    </div>
</div>

  @include('viewpublik/layouts/footer')

<!-- Bootstrap + AOS Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init();
</script>

<script>
    // Menangani tampilan gambar dalam modal saat diklik
    document.addEventListener('DOMContentLoaded', function () {
        const imageModal = document.getElementById('modalImage');
        const imagePreview = document.getElementById('modalImagePreview');

        imageModal.addEventListener('show.bs.modal', function (event) {
            const triggerImg = event.relatedTarget;
            const imgSrc = triggerImg.getAttribute('data-img');
            imagePreview.src = imgSrc;
        });
    });
</script>

</body>
</html>