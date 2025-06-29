<?php

namespace App\Http\Controllers\Halpublik;

use App\Http\Controllers\Controller;
use App\Models\SchoolProfile;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Ekstrakurikuler;
use App\Models\SaranaPrasarana;
use App\Models\Contact;
use Illuminate\Http\Request;

class SchoolProfilPublikController extends Controller
{
    public function index()
    {
        $profil = SchoolProfile::first(); // ambil data profil dari model
        $jumlahSiswa = Siswa::first()?->jumlah_siswa ?? 0;
        $jumlahGuru = Guru::count();
        $jumlahEkstrakurikuler = Ekstrakurikuler::count();
        $jumlahSarana = SaranaPrasarana::count();
        $kontak = Contact::first(); 

        return view('viewpublik.halaman.profilsekolah', compact('profil','jumlahSiswa','jumlahGuru','jumlahEkstrakurikuler','jumlahSarana','kontak'));
    }
}

