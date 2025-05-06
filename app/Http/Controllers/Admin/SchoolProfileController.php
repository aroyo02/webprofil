<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolProfile;

class SchoolProfileController extends Controller
{
    public function index()
    {
        $profilSekolah = SchoolProfile::first();
        return view('admin.profilsekolah.index', compact('profilSekolah'));
    }

    public function store(Request $request)
    {
        if (SchoolProfile::count() > 0) {
            return redirect()->route('admin.profilsekolah.index')->with('error', 'Profil sudah ada, silakan edit.');
        }

        $request->validate([
            'content' => 'required',
        ]);

        SchoolProfile::create([
            'content' => $request->content,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Profil sekolah berhasil ditambahkan.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'content' => 'required',
        ]);

        $profilSekolah = SchoolProfile::first();
        $profilSekolah->update([
            'content' => $request->content,
        ]);

        return redirect()->route('admin.dashboard')->with('updated', 'Profil sekolah berhasil diperbarui.');
    }

    public function destroy()
    {
        $profilSekolah = SchoolProfile::first();
        if ($profilSekolah) {
            $profilSekolah->delete();
        }

        return redirect()->route('admin.dashboard')->with('deleted', 'Profil sekolah berhasil dihapus.');
    }
}
