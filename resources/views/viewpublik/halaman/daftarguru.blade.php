<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SDN 1 Wirasaba</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>

    .teacher-card {
      border: 2px solid #eee;
      padding: 30px 20px;
      border-radius: 6px;
      transition: all 0.3s ease;
    }

    .teacher-card:hover {
      box-shadow: 0 0 15px rgba(0, 0, 0, 0.08);
    }

    .teacher-img {
      width: 120px;
      height: 120px;
      object-fit: cover;
      border-radius: 50%;
      margin: 0 auto 20px;
      display: block;
    }

    .teacher-name {
      font-weight: bold;
      margin-bottom: 5px;
    }

    .teacher-role {
      color: #999;
      font-size: 0.9rem;
      margin-bottom: 15px;
    }

    </style>

</head>

<body>

@include('viewpublik/layouts/navbar')

<div class="container text-center py-5">
  <h2 class="fw-bold animate__animated animate__fadeInUp">Guru & Staf Sekolah</h2>
  <p class="text-muted mx-auto animate__animated animate__fadeInUp animate__delay-1s" style="max-width: 700px;">
    Berikut merupakan daftar guru dan staf yang ada di SD Negeri 1 Wirasaba
  </p>

  <div class="row mt-4 g-4">
    @foreach($guru as $guru)
    <div class="col-lg-3 col-md-6 col-sm-12" data-aos="fade-up">
      <div class="teacher-card">
        <img src="{{ asset('storage/' . $guru->gambar) }}" class="teacher-img" alt="Foto Guru" width="100">
            <div class="card-body">
                <h5 class="teacher-name">{{ $guru->nama }}</h5>
                <p class="teacher-role">{{ $guru->keterangan }}</p>
            </div>
      </div>
    </div>
    @endforeach
  </div>
</div>

@include('viewpublik/layouts/footer')

<!-- script dropdown -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init();
</script>

</body>
</html>