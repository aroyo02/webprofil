<?php

namespace App\Http\Controllers\Halpublik;

use App\Http\Controllers\Controller;
use App\Models\SchoolProfile;
use App\Models\Ekstrakurikuler;
use App\Models\Contact;
use Illuminate\Http\Request;

class EkstrakurikulerPublikController extends Controller
{
    public function index(Request $request)
    {
        $profil = SchoolProfile::first();
        $kontak = Contact::first();

        $query = Ekstrakurikuler::query();

        if ($request->has('search')) {
            $search = $request->search;
            $query->where('nama', 'like', "%$search%")
                  ->orWhere('deskripsi', 'like', "%$search%");
        }

        $ekstrakurikuler = $query->paginate(8); // Gunakan paginate agar bisa digunakan dengan links()

        return view('viewpublik.halaman.ekstrakurikuler', compact('profil', 'ekstrakurikuler', 'kontak'));
    }
}
