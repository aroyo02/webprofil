<?php

namespace App\Http\Controllers\Halpublik;

use App\Http\Controllers\Controller;
use App\Models\SchoolProfile;
use App\Models\Berita;
use App\Models\Contact;
use Illuminate\Http\Request;

class BeritaPublikController extends Controller
{
    public function index()
    {
        $profil = SchoolProfile::first();
        $beritas = Berita::latest()->get();
        $kontak = Contact::first(); 
        return view('viewpublik.halaman.berita', compact('profil','beritas','kontak'));
    }
    
    public function show($id)
    {
        $profil = SchoolProfile::first();
        $berita = Berita::findOrFail($id);
        $kontak = Contact::first(); 
        return view('viewpublik.halaman.detailberita', compact('profil','berita','kontak'));
    }

}
