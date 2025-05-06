<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolProfile;
use App\Models\Vision;
use App\Models\Mission;
use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $profilsekolah = SchoolProfile::first(); // ambil satu data (karena cuma ada 1 profil sekolah)
        $vision = Vision::latest()->first();
        $mission = Mission::latest()->first();
        $struktur = StrukturOrganisasi::first();

        // Kirim data ke view dashboard
        return view('admin.dashboard', compact('profilsekolah', 'vision', 'mission', 'struktur'));
    }
}
