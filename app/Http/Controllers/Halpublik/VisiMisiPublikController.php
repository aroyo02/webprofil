<?php

namespace App\Http\Controllers\Halpublik;

use App\Http\Controllers\Controller;
use App\Models\Vision;
use App\Models\Mission;
use Illuminate\Http\Request;

class VisiMisiPublikController extends Controller
{
    public function index()
    {
        $visi = Vision::first();
        $misi = Mission::first();
        return view('viewpublik.halaman.visimisi', compact('visi', 'misi'));
    }
}

