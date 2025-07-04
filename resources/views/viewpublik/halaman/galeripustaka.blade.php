<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Galeri Pustaka - SDN 1 Wirasaba</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

  <style>
    body { padding-top: 50px; }
    .gallery-title { font-weight: 700; }
    .masonry {
      column-count: 1;
      column-gap: 1rem;
    }
    @media (min-width: 576px) { .masonry { column-count: 2; } }
    @media (min-width: 768px) { .masonry { column-count: 3; } }
    @media (min-width: 992px) { .masonry { column-count: 4; } }
    .masonry-item {
      break-inside: avoid;
      margin-bottom: 2rem;
      border-radius: 8px;
      overflow: hidden;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
      transition: transform 0.3s ease;
      background: #fff;
      padding: 0.5rem;
    }
    .masonry-item:hover { transform: scale(1.02); }
    .masonry-item img { width: 100%; height: auto; border-radius: 6px; }
    .masonry-item p { margin-top: 0.5rem; font-size: 0.95rem; }
    .cursor-pointer { cursor: pointer; }
  </style>
</head>
<body>

@include('viewpublik.layouts.navbar')

<div class="container py-5">
  <h2 class="text-center gallery-title mb-4 animate__animated animate__fadeInDown" data-aos="fade-down" data-aos-duration="1000">
    Galeri Pustaka
  </h2>

  <!-- Form Filter dan Search -->
  <form method="GET" class="row g-3 justify-content-center mb-4">
    <div class="col-md-4">
      <input type="text" name="q" class="form-control" placeholder="Cari judul buku..." value="{{ request('q') }}">
    </div>
    <div class="col-md-3">
      <select name="kategori" class="form-select">
        <option value="">Semua Kategori</option>
        @foreach($kategoriList as $kategori)
          <option value="{{ $kategori }}" {{ request('kategori') == $kategori ? 'selected' : '' }}>
            {{ $kategori }}
          </option>
        @endforeach
      </select>
    </div>
    <div class="col-md-2">
      <button type="submit" class="btn btn-primary w-100">Tampilkan</button>
    </div>
  </form>

  <!-- Galeri Buku -->
  <div class="masonry">
    @forelse($bukus as $buku)
      <div class="masonry-item" data-aos="zoom-in" data-aos-duration="700" data-aos-delay="{{ $loop->index * 100 }}">
        <img src="{{ asset('storage/' . $buku->sampul) }}" alt="Sampul Buku" class="cursor-pointer"
             data-bs-toggle="modal" data-bs-target="#modalDetail{{ $buku->id }}" />
        <p class="text-center fw-medium mt-2">{{ $buku->judul }}</p>
      </div>

      <!-- Modal Detail Buku -->
      <div class="modal fade" id="modalDetail{{ $buku->id }}" tabindex="-1" aria-labelledby="detailLabel{{ $buku->id }}" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
          <div class="modal-content">
            <div class="modal-body p-4">
              <div class="row">
                <div class="col-md-5 text-center">
                  <img src="{{ asset('storage/' . $buku->sampul) }}" alt="Sampul" class="img-fluid rounded mb-3">
                </div>
                <div class="col-md-7">
                  <h4 class="mb-2 fw-bold">{{ $buku->judul }}</h4>

                    <div class="d-flex mt-5">
                        <div class="fw-semibold me-2" style="min-width: 120px;">Penulis:</div>
                        <div>{{ $buku->penulis }}</div>
                    </div>
                    <div class="d-flex mb-1">
                        <div class="fw-semibold me-2" style="min-width: 120px;">Penerbit:</div>
                        <div>{{ $buku->penerbit }}</div>
                    </div>
                    <div class="d-flex mb-1">
                        <div class="fw-semibold me-2" style="min-width: 120px;">Tahun Terbit:</div>
                        <div>{{ $buku->tahun_terbit }}</div>
                    </div>
                    <div class="d-flex mb-1">
                        <div class="fw-semibold me-2" style="min-width: 120px;">Stok:</div>
                        <div>{{ $buku->stok }}</div>
                    </div>
                    <div class="d-flex mb-1">
                        <div class="fw-semibold me-2" style="min-width: 120px;">Kategori:</div>
                        <div>{{ $buku->kategori }}</div>
                    </div>
                    <div class="mt-5">
                        <div class="fw-semibold mb-1">Deskripsi:</div>
                        <div>{!! $buku->deskripsi !!}</div>
                    </div>
                </div>
              </div>
              <div class="text-end">
                <button type="button" class="btn btn-secondary mt-3" data-bs-dismiss="modal">Tutup</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    @empty
      <p class="text-center text-muted mt-4">Tidak ada buku yang ditemukan.</p>
    @endforelse
  </div>
</div>

@include('viewpublik.layouts.whatsapp')
@include('viewpublik.layouts.footer')

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script>
  AOS.init({ once: true, duration: 800, easing: 'ease-in-out' });
</script>
</body>
</html>
