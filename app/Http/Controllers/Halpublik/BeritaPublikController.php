<?php

namespace App\Http\Controllers\Halpublik;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaPublikController extends Controller
{
    public function index()
    {
        $beritas = Berita::latest()->get();
        return view('viewpublik.halaman.berita', compact('beritas'));
    }
    
    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        return view('viewpublik.halaman.detailberita', compact('berita'));
    }

}
