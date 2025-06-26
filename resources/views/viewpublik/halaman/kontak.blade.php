<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontak SDN 1 Wirasaba</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
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
                Jl. Contoh No. 123, Wirasaba, Bukateja, Purbalingga, Jawa Tengah 53382
            </p>

            <p class="mb-1"><i class="bi bi-clock kontak-icon"></i><strong>Jam Operasional:</strong><br>
                Senin - Jumat: 07.00 – 14.00 WIB<br>
                Sabtu - Minggu: Libur
            </p>

            <p class="mb-1"><i class="bi bi-telephone kontak-icon"></i><strong>Nomor Telepon:</strong><br>
                0812-3456-7890
            </p>

            <p><i class="bi bi-envelope kontak-icon"></i><strong>Email:</strong><br>
                sdn1wirasaba@gmail.com
            </p>
        </div>

        <!-- Kolom Kanan -->
        <div class="col-lg-6">
            <h4 class="mb-3 fw-bold"><i class="bi bi-map kontak-icon"></i>Lokasi SDN 1 Wirasaba</h4>
            <iframe 
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.1100067412!2d109.4175892745488!3d-7.453080673451991!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6550e6fd8c3555%3A0xf322366af535cbb8!2sSD%20Negeri%20Wirasaba%201!5e0!3m2!1sid!2sid!4v1750912401340!5m2!1sid!2sid" 
                allowfullscreen="" 
                loading="lazy" 
                referrerpolicy="no-referrer-when-downgrade">
            </iframe>
        </div>
    </div>
</div>

@include('viewpublik/layouts/footer')

<!-- Bootstrap JS + Icons -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

</body>
</html>
