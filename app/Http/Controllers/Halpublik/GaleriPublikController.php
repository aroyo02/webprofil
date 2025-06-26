<?php

namespace App\Http\Controllers\Halpublik;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;

class GaleriPublikController extends Controller
{
    public function index()
    {
        $galeris = Galeri::all();
        return view('viewpublik.halaman.galeri', compact('galeris'));
    }
}
