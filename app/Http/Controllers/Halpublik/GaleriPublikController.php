<?php

namespace App\Http\Controllers\Halpublik;

use App\Http\Controllers\Controller;
use App\Models\SchoolProfile;
use App\Models\Galeri;
use App\Models\Contact;
use Illuminate\Http\Request;

class GaleriPublikController extends Controller
{
    public function index()
    {
        $profil = SchoolProfile::first();
        $galeris = Galeri::all();
        $kontak = Contact::first(); 
        return view('viewpublik.halaman.galeri', compact('profil','galeris','kontak'));
    }
}
