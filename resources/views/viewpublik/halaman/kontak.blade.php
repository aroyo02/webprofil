<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak SDN 1 Wirasaba</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
         body {
            padding-top: 50px;
        }
        
        .kontak-icon {
            margin-right: 8px;
            color: #ffc107;
        }
        iframe {
            border: none;
            width: 100%;
            height: 350px;
            border-radius: 8px;
        }
    </style>
</head>
<body>

@include('viewpublik.layouts.navbar')

<div class="container py-5">
    <div class="row g-4">
        <!-- Kolom Kiri -->
        <div class="col-lg-6">
            <h4 class="mb-3 fw-bold"><i class="bi bi-geo-alt kontak-icon"></i>Hubungi SDN 1 Wirasaba</h4>
            <p>Terima kasih telah mengunjungi website SDN 1 Wirasaba. Kami siap membantu dan menjawab segala pertanyaan Anda terkait kegiatan sekolah, dan informasi lainnya. Kami siap menjalin komunikasi yang baik dengan masyarakat, siswa, dan orangtua. Jika Anda memiliki pertanyaan, masukan, atau informasi
            yang ingin disampaikan, silakan hubungi kami melalui media yang tersedia di bawah ini. Kami akan berusaha memberikan respon terbaik untuk kebutuhan Anda.</p>

            <p class="mb-1"><i class="bi bi-geo-alt kontak-icon"></i><strong>Alamat:</strong><br>
                {{ $kontak->alamat ?? 'Alamat belum tersedia' }}
            </p>

            <p class="mb-1"><i class="bi bi-clock kontak-icon"></i><strong>Jam Operasional:</strong><br>
                {!! $kontak->jam_operasional ?? 'Jam operasional belum tersedia' !!}
            </p>

            <p class="mb-1"><i class="bi bi-telephone kontak-icon"></i><strong>Nomor Telepon:</strong><br>
                {{ $kontak->telepon ?? '-' }}
            </p>

            <p><i class="bi bi-envelope kontak-icon"></i><strong>Email:</strong><br>
                {{ $kontak->email ?? '-' }}
            </p>
        </div>

        <!-- Kolom Kanan -->
        <div class="col-lg-6">
            <h4 class="mb-3 fw-bold"><i class="bi bi-map kontak-icon"></i>Lokasi SDN 1 Wirasaba</h4>
            <iframe 
                src="{!! $kontak->maps_embed ?? '' !!}" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</div>

@include('viewpublik.layouts.whatsapp')
@include('viewpublik/layouts/footer')

<!-- Bootstrap JS + Icons -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

</body>
</html>
