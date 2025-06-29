<?php

namespace App\Http\Controllers\Halpublik;

use App\Http\Controllers\Controller;
use App\Models\SchoolProfile;
use App\Models\Berita;
use App\Models\Contact;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Ekstrakurikuler;
use App\Models\SaranaPrasarana;

class DashboardPublikController extends Controller
{
    public function index()
    {
        $profil = SchoolProfile::first();
        $beritas = Berita::latest()->get();
        $kontak = Contact::first(); 

        $jumlahSiswa = Siswa::first()?->jumlah_siswa ?? 0;
        $jumlahGuru = Guru::count();
        $jumlahEkstrakurikuler = Ekstrakurikuler::count();
        $jumlahSarana = SaranaPrasarana::count();

        return view('viewpublik.halaman.dashboardpublik', compact('profil', 'beritas', 'kontak','jumlahSiswa', 'jumlahGuru', 'jumlahEkstrakurikuler', 'jumlahSarana'));
    }
}
