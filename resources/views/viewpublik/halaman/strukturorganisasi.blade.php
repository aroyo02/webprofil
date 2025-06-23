<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Struktur Organisasi - SDN 1 Wirasaba</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <style>
        .struktur-img {
            max-width: 100%;
            height: auto;
            max-height: 700px;
            margin-top: 30px;
            cursor: zoom-in;
            transition: transform 0.3s ease;
        }

        .modal-img {
            max-width: 100%;
            max-height: 90vh;
        }

        .modal-dialog {
            max-width: 90%;
        }
    </style>
</head>

<body>
    @include('viewpublik.layouts.navbar')

    <section class="py-5">
        <div class="container text-center">
            <h2 class="fw-bold animate__animated animate__fadeInUp">Struktur Organisasi SD Negeri 1 Wirasaba</h2>

            @if ($struktur && $struktur->image)
                <div class="d-flex justify-content-center">
                    <img src="{{ asset('storage/' . $struktur->image) }}" alt="Struktur Organisasi"
                         class="img-fluid rounded shadow struktur-img"
                         data-bs-toggle="modal" data-bs-target="#gambarModal">
                </div>
            @else
                <p class="text-muted fst-italic mt-4">Belum ada data struktur organisasi yang tersedia.</p>
            @endif
        </div>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="gambarModal" tabindex="-1" aria-labelledby="gambarModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content bg-transparent border-0">
                <div class="modal-body text-center">
                    <img src="{{ asset('storage/' . $struktur->image ?? '') }}" alt="Struktur Organisasi"
                         class="img-fluid modal-img" id="zoomableImage">
                </div>
            </div>
        </div>
    </div>

    <!-- Script -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Zoom on scroll
        const img = document.getElementById('zoomableImage');
        let scale = 1;
        img.addEventListener('wheel', function (e) {
            e.preventDefault();
            if (e.deltaY < 0) {
                scale += 0.1;
            } else {
                scale -= 0.1;
                if (scale < 1) scale = 1;
            }
            img.style.transform = `scale(${scale})`;
        });

        // Reset zoom on modal close
        const modal = document.getElementById('gambarModal');
        modal.addEventListener('hidden.bs.modal', function () {
            scale = 1;
            img.style.transform = `scale(1)`;
        });
    </script>
</body>
</html>
