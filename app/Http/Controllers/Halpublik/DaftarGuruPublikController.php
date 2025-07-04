<?php

namespace App\Http\Controllers\Halpublik;

use App\Http\Controllers\Controller;
use App\Models\SchoolProfile;
use App\Models\Guru;
use App\Models\Contact;
use Illuminate\Http\Request;

class DaftarGuruPublikController extends Controller
{
    public function index(Request $request)
    {
        $profil = SchoolProfile::first();
        $kontak = Contact::first();

        $query = Guru::query();
        if ($request->has('search') && $request->search != '') {
            $query->where('nama', 'like', '%' . $request->search . '%')
                  ->orWhere('keterangan', 'like', '%' . $request->search . '%');
        }

        $guru = $query->latest()->get(); // tanpa pagination

        return view('viewpublik.halaman.daftarguru', compact('profil', 'guru', 'kontak'));
    }
}
