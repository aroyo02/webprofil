<?php

namespace App\Http\Controllers\Halpublik;

use App\Http\Controllers\Controller;
use App\Models\SchoolProfile;

class DashboardPublikController extends Controller
{
    public function index()
    {
        $profil = SchoolProfile::first();
        return view('viewpublik.halaman.dashboardpublik', compact('profil'));
    }
}
