<?php

namespace App\Http\Controllers\Halpublik;

use App\Http\Controllers\Controller;
use App\Models\SchoolProfile;
use App\Models\Ekstrakurikuler;
use App\Models\Contact;
use Illuminate\Http\Request;

class EkstrakurikulerPublikController extends Controller
{
    public function index()
    {
        $profil = SchoolProfile::first();
        $ekstrakurikuler = Ekstrakurikuler::all();
        $kontak = Contact::first(); 
        return view('viewpublik.halaman.ekstrakurikuler', compact('profil','ekstrakurikuler','kontak'));
    }
}
