<?php

namespace App\Http\Controllers\Halpublik;

use App\Http\Controllers\Controller;
use App\Models\SaranaPrasarana;
use Illuminate\Http\Request;

class SarprasPublikController extends Controller
{
    public function index()
    {
        $data = SaranaPrasarana::all();
        return view('viewpublik.halaman.saranaprasarana', compact('data'));
    }
}
