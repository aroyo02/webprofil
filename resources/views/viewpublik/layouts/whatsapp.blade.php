@if(isset($kontak) && !empty($kontak->telepon))
    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $kontak->telepon) }}"
       class="whatsapp-float"
       target="_blank"
       aria-label="Chat via WhatsApp"
       title="Hubungi via WhatsApp">
        <div class="wa-text-wrapper">
            Hubungi Kami
        </div>
    </a>
@endif

@php
    use App\Helpers\VisitorHelper;
    $todayVisitors = VisitorHelper::getTodayVisitors();
    $monthVisitors = VisitorHelper::getMonthlyVisitors();
@endphp

<div class="footer-visitors text-center mt-5 mb-3">
    <small class="text-muted">
        <strong>Pengunjung Hari Ini:</strong> {{ $todayVisitors }} |
        <strong>Bulan Ini:</strong> {{ $monthVisitors }}
    </small>
</div>

<style>
    .whatsapp-float {
        position: fixed;
        bottom: 25px;
        right: 25px;
        z-index: 999;
        text-decoration: none;
    }

    .wa-text-wrapper {
        padding: 12px 20px;
        background-color: #25D366;
        color: white;
        border-radius: 30px;
        font-weight: bold;
        box-shadow: 0 0 12px rgba(0, 0, 0, 0.2);
        transition: transform 0.3s ease, box-shadow 0.3s;
        font-size: 16px;
    }

    .wa-text-wrapper:hover {
        transform: scale(1.1);
        box-shadow: 0 0 18px rgba(0, 0, 0, 0.3);
    }

    .footer-visitors {
        font-size: 0.9rem;
        color: #6c757d;
        margin-bottom: 80px; /* agar tidak tertutup tombol WhatsApp */
    }
</style>
