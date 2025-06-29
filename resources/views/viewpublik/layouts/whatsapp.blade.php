@if(isset($kontak) && !empty($kontak->telepon))
    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $kontak->telepon) }}"
       class="whatsapp-float"
       target="_blank"
       aria-label="Chat via WhatsApp"
       title="Hubungi via WhatsApp">
        <div class="wa-icon-wrapper">
            <img src="https://img.icons8.com/color/48/000000/whatsapp--v1.png" alt="WhatsApp">
        </div>
    </a>

    <style>
        .whatsapp-float {
            position: fixed;
            bottom: 25px;
            right: 25px;
            z-index: 999;
            text-decoration: none;
        }

        .wa-icon-wrapper {
            width: 65px;
            height: 65px;
            background-color: white;
            border-radius: 50%;
            box-shadow: 0 0 12px rgba(0, 0, 0, 0.2);
            display: flex;
            align-items: center;
            justify-content: center;
            transition: transform 0.3s ease, box-shadow 0.3s;
        }

        .wa-icon-wrapper:hover {
            transform: scale(1.1);
            box-shadow: 0 0 18px rgba(0, 0, 0, 0.3);
        }

        .wa-icon-wrapper img {
            width: 60px;
            height: 60px;
        }
    </style>
@endif
