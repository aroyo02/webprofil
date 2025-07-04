<?php

namespace App\Http\Controllers\Halpublik;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GaleriPustaka;
use App\Models\SchoolProfile;
use App\Models\Contact;

class GaleriPustakaPublikController extends Controller
{
    public function index(Request $request)
    {
        $profil = SchoolProfile::first();
        $kontak = Contact::first();

        $query = GaleriPustaka::query();

        // Filter berdasarkan kategori jika ada
        if ($request->filled('kategori')) {
            $query->where('kategori', $request->kategori);
        }

        // Pencarian berdasarkan judul buku
        if ($request->filled('q')) {
            $query->where('judul', 'like', '%' . $request->q . '%');
        }

        // Ambil data buku dan daftar kategori
        $bukus = $query->orderBy('created_at', 'desc')->get();
        $kategoriList = GaleriPustaka::select('kategori')->distinct()->pluck('kategori');

        return view('viewpublik.halaman.galeripustaka', compact(
            'profil', 'kontak', 'bukus', 'kategoriList'
        ));
    }
}
