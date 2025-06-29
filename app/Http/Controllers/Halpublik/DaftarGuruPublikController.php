<?php

namespace App\Http\Controllers\Halpublik;

use App\Http\Controllers\Controller;
use App\Models\SchoolProfile;
use App\Models\Guru;
use App\Models\Contact;
use Illuminate\Http\Request;

class DaftarGuruPublikController extends Controller
{
    public function index()
    {
        $profil = SchoolProfile::first();
        $guru = Guru::all();
        $kontak = Contact::first(); 
        return view('viewpublik.halaman.daftarguru', compact('profil','guru','kontak'));
    }
}