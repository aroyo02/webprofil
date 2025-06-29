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
        // Ambil satu data profil sekolah
        $profilSekolah = SchoolProfile::first();

        // Ambil data terbaru untuk visi dan misi
        $vision = Vision::latest()->first();
        $mission = Mission::latest()->first();

        // Ambil struktur organisasi
        $struktur = StrukturOrganisasi::first();

        // Ambil total data
        $jumlahSiswa = Siswa::first()?->jumlah_siswa ?? 0;
        $jumlahGuru = Guru::count();
        $jumlahEkstrakurikuler = Ekstrakurikuler::count();
        $jumlahSarana = SaranaPrasarana::count();

        // Kirim ke view
        return view('admin.dashboard', compact(
            'profilSekolah',
            'vision',
            'mission',
            'struktur',
            'jumlahSiswa',
            'jumlahGuru',
            'jumlahEkstrakurikuler',
            'jumlahSarana'
        ));
    }
}
