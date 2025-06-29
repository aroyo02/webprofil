<?php

namespace App\Http\Controllers\Halpublik;

use App\Http\Controllers\Controller;
use App\Models\SchoolProfile;
use App\Models\Contact;

class kontakPublikController extends Controller
{
    public function index()
    {
        $profil = SchoolProfile::first();
        $kontak = Contact::first(); 
        return view('viewpublik.halaman.kontak', compact('profil','kontak'));
    }
}
