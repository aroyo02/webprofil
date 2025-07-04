<?php

namespace App\Http\Controllers\Halpublik;

use App\Http\Controllers\Controller;
use App\Models\SchoolProfile;
use App\Models\Prestasi;
use App\Models\Contact;
use Illuminate\Http\Request;

class PrestasiPublikController extends Controller
{
    public function index(Request $request)
{
    $profil = SchoolProfile::first();
    $kontak = Contact::first();

    $query = Prestasi::query();

    if ($request->has('search') && $request->search != '') {
        $query->where('judul', 'like', '%' . $request->search . '%')
              ->orWhere('deskripsi', 'like', '%' . $request->search . '%');
    }

    $prestasi = $query->get(); // gunakan paginate() jika butuh pagination

    return view('viewpublik.halaman.prestasi', compact('profil','prestasi','kontak'));
}

}
