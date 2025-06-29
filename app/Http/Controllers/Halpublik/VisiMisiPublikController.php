<?php

namespace App\Http\Controllers\Halpublik;

use App\Http\Controllers\Controller;
use App\Models\SchoolProfile;
use App\Models\Vision;
use App\Models\Mission;
use App\Models\Contact;
use Illuminate\Http\Request;

class VisiMisiPublikController extends Controller
{
    public function index()
    {
        $profil = SchoolProfile::first();
        $visi = Vision::first();
        $misi = Mission::first();
        $kontak = Contact::first(); 
        return view('viewpublik.halaman.visimisi', compact('profil','visi', 'misi','kontak'));
    }
}

