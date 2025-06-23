<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolProfile;
use App\Models\Vision;
use App\Models\Mission;
use App\Models\StrukturOrganisasi;
use App\Models\Siswa;
use App\Models\Guru;
use App\Models\Ekstrakurikuler;
use App\Models\SaranaPrasarana;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $profilsekolah = SchoolProfile::first(); // ambil satu data (karena cuma ada 1 profil sekolah)
        $vision = Vision::latest()->first();
        $mission = Mission::latest()->first();
        $struktur = StrukturOrganisasi::first();
    
        $jumlahSiswa = Siswa::first()?->jumlah_siswa ?? 0;
        $jumlahGuru = Guru::count();
        $jumlahEkstrakurikuler = Ekstrakurikuler::count();
        $jumlahSarana = SaranaPrasarana::count();

        return view('admin.dashboard', compact('profilsekolah', 'vision', 'mission', 'struktur', 'jumlahSiswa', 'jumlahGuru', 'jumlahEkstrakurikuler', 'jumlahSarana'));

    }
    
}
