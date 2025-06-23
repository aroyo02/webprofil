<?php

namespace App\Http\Controllers\Halpublik;

use App\Http\Controllers\Controller;
use App\Models\StrukturOrganisasi;

class StrukturOrganisasiPublikController extends Controller
{
    public function index()
    {
        // Ambil data struktur terbaru (karena hanya 1)
        $struktur = StrukturOrganisasi::first();

        return view('viewpublik.halaman.strukturorganisasi', compact('struktur'));
    }
}
