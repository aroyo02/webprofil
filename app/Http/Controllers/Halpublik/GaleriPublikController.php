<?php

namespace App\Http\Controllers\Halpublik;

use App\Http\Controllers\Controller;
use App\Models\SchoolProfile;
use App\Models\Galeri;
use App\Models\Contact;
use Illuminate\Http\Request;

class GaleriPublikController extends Controller
{
    
public function index(Request $request)
{
    $profil = SchoolProfile::first();
    $kontak = Contact::first();

    $search = $request->input('search');

    $galeris = Galeri::when($search, function ($query, $search) {
        return $query->where('judul', 'like', '%' . $search . '%');
    })->get();

    return view('viewpublik.halaman.galeri', compact('profil', 'galeris', 'kontak'));
}

}
