<?php

namespace App\Http\Controllers\Halpublik;

use App\Http\Controllers\Controller;
use App\Models\SchoolProfile;
use App\Models\Berita;
use App\Models\Contact;
use Illuminate\Http\Request;

class BeritaPublikController extends Controller
{
       public function index(Request $request)
    {
        $profil = SchoolProfile::first();
        $kontak = Contact::first();
        $search = $request->input('search');

        $beritas = Berita::when($search, function ($query, $search) {
            return $query->where('judul', 'like', '%' . $search . '%')
                         ->orWhere('deskripsi', 'like', '%' . $search . '%');
        })->latest()->get();

        return view('viewpublik.halaman.berita', compact('profil', 'beritas', 'kontak'));
    }
    
    public function show($id)
    {
        $profil = SchoolProfile::first();
        $berita = Berita::findOrFail($id);
        $kontak = Contact::first(); 
        return view('viewpublik.halaman.detailberita', compact('profil','berita','kontak'));
    }

}
