<?php

namespace App\Http\Controllers\Halpublik;

use App\Http\Controllers\Controller;
use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;

class EkstrakurikulerPublikController extends Controller
{
    public function index()
    {
        $ekstrakurikuler = Ekstrakurikuler::all();
        return view('viewpublik.halaman.ekstrakurikuler', compact('ekstrakurikuler'));
    }
}
