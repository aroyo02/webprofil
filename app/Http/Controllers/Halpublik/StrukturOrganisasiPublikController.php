<?php

namespace App\Http\Controllers\Halpublik;

use App\Http\Controllers\Controller;
use App\Models\SchoolProfile;
use App\Models\StrukturOrganisasi;
use App\Models\Contact;

class StrukturOrganisasiPublikController extends Controller
{
    public function index()
    {
        $kontak = Contact::first(); 
        $profil = SchoolProfile::first();
        $struktur = StrukturOrganisasi::first();

        return view('viewpublik.halaman.strukturorganisasi', compact('kontak','profil','struktur'));
    }
}
