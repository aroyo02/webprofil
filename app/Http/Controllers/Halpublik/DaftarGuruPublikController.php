<?php

namespace App\Http\Controllers\Halpublik;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use Illuminate\Http\Request;

class DaftarGuruPublikController extends Controller
{
    public function index()
    {
        $guru = Guru::all();
        return view('viewpublik.halaman.daftarguru', compact('guru'));
    }
}