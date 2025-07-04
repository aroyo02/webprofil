<?php

namespace App\Http\Controllers\Halpublik;

use App\Http\Controllers\Controller;
use App\Models\SchoolProfile;
use App\Models\SaranaPrasarana;
use App\Models\Contact;
use Illuminate\Http\Request;

class SarprasPublikController extends Controller
{
    public function index(Request $request)
    {
        $profil = SchoolProfile::first();
        $kontak = Contact::first();

        // Ambil keyword pencarian jika ada
        $search = $request->input('search');

        // Query data sarpras
        $query = SaranaPrasarana::query();

        if (!empty($search)) {
            $query->where('nama', 'like', '%' . $search . '%');
        }

        $data = $query->get();

        return view('viewpublik.halaman.saranaprasarana', compact('profil', 'data', 'kontak'));
    }
}
