<?php

namespace App\Http\Controllers\Halpublik;

use App\Http\Controllers\Controller;
use App\Models\SchoolProfile;
use Illuminate\Http\Request;

class SchoolProfilPublikController extends Controller
{
    public function index()
    {
        $profil = SchoolProfile::first(); // ambil data profil dari model
        return view('viewpublik.halaman.profilsekolah', compact('profil'));
    }
}

