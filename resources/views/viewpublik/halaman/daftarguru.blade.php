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
      background: #f8f9fa;
      padding-top: 50px;
    }

    .teacher-section {
      padding: 60px 0;
    }

    .teacher-card {
      background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(8px);
      border-radius: 12px;
      padding: 30px 20px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      box-shadow: 0 8px 16px rgba(0, 0, 0, 0.08);
      border: none;
      text-align: center;
      height: 100%;
    }

    .teacher-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
    }

    .teacher-img {
      width: 120px;
      height: 120px;
      object-fit: cover;
      border-radius: 50%;
      border: 4px solid #0d6efd;
      margin-bottom: 15px;
    }

    .teacher-name {
      font-weight: 700;
      font-size: 1.1rem;
      margin-bottom: 6px;
    }

    .teacher-role {
      color: #6c757d;
      font-size: 0.95rem;
    }

    @media (max-width: 768px) {
      .teacher-img {
        width: 100px;
        height: 100px;
      }
    }
  </style>
</head>

<body>

  @include('viewpublik/layouts/navbar')

  <section class="teacher-section">
    <div class="container text-center">
      <h2 class="fw-bold animate__animated animate__fadeInUp">Guru & Staf Sekolah</h2>
      <p class="text-muted mx-auto animate__animated animate__fadeInUp animate__delay-1s" style="max-width: 700px;">
        Berikut merupakan daftar guru dan staf yang ada di SD Negeri 1 Wirasaba
      </p>

      <div class="row mt-5 g-4">
        @foreach($guru as $guru)
        <div class="col-lg-3 col-md-4 col-sm-6 col-12" data-aos="zoom-in" data-aos-duration="800">
          <div class="teacher-card h-100">
            <img src="{{ asset('storage/' . $guru->gambar) }}" class="teacher-img" alt="{{ $guru->nama }}">
            <h5 class="teacher-name">{{ $guru->nama }}</h5>
            <p class="teacher-role">{{ $guru->keterangan }}</p>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </section>

  @include('viewpublik.layouts.whatsapp')
  @include('viewpublik/layouts/footer')

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init();
  </script>

</body>
</html>
