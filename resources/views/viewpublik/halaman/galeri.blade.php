<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Galeri Sekolah - SDN 1 Wirasaba</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

  <style>
     body {
            padding-top: 50px;
        }
        
    .gallery-title {
      font-weight: 700;
    }

    .masonry {
      column-count: 1;
      column-gap: 1rem;
    }

    @media (min-width: 576px) {
      .masonry {
        column-count: 2;
      }
    }

    @media (min-width: 768px) {
      .masonry {
        column-count: 3;
      }
    }

    @media (min-width: 992px) {
      .masonry {
        column-count: 4;
      }
    }

    .masonry-item {
      break-inside: avoid;
      margin-bottom: 1rem;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
      transition: transform 0.3s ease;
    }

    .masonry-item:hover {
      transform: scale(1.02);
    }

    .masonry-item img,
    .masonry-item video {
      width: 100%;
      height: auto;
      display: block;
    }

    .cursor-pointer {
      cursor: pointer;
    }
  </style>
</head>

<body data-bs-spy="scroll" data-bs-target="#navbar" data-bs-offset="70" tabindex="0">

  @include('viewpublik/layouts/navbar')

  <div class="container py-5">
    <h2 class="text-center gallery-title mb-4 animate__animated animate__fadeInDown" data-aos="fade-down" data-aos-duration="1000">Galeri Sekolah</h2>

    <div class="masonry">
      @foreach($galeris as $galeri)
        <div class="masonry-item" data-aos="zoom-in" data-aos-duration="700" data-aos-delay="{{ $loop->index * 100 }}">
          @if($galeri->tipe === 'image')
            <img 
              src="{{ asset('storage/galeri/' . $galeri->file) }}" 
              alt="gambar" 
              class="cursor-pointer" 
              data-bs-toggle="modal" 
              data-bs-target="#modalImage" 
              data-img="{{ asset('storage/galeri/' . $galeri->file) }}"
            >
          @else
            <video controls>
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

  @include('viewpublik.layouts.whatsapp')
  @include('viewpublik/layouts/footer')

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({
      once: true,              // hanya animasi pertama kali
      duration: 800,           // durasi default animasi
      easing: 'ease-in-out',   // efek animasi halus
    });

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
