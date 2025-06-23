<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StrukturOrganisasi;
use Illuminate\Support\Facades\Storage;

class StrukturOrganisasiController extends Controller
{
    public function index()
    {
        $struktur = StrukturOrganisasi::first();
        return view('admin.strukturorganisasi.index', compact('struktur'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image|max:2048', // 2048 KB = 2 MB
        ], [
            'image.max' => 'Ukuran gambar maksimal 2MB.',
            'image.required' => 'Silakan pilih gambar terlebih dahulu.',
            'image.image' => 'File harus berupa gambar.',
        ]);        

        // Hapus data lama jika ada
        $existing = StrukturOrganisasi::first();
        if ($existing) {
            Storage::delete('public/' . $existing->image);
            $existing->delete();
        }

        $path = $request->file('image')->store('struktur', 'public');

        StrukturOrganisasi::create([
            'image' => $path,
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Struktur organisasi berhasil ditambahkan.');
    }

     public function destroy()
    {
        $struktur = StrukturOrganisasi::first();

        if ($struktur) {
            if ($struktur->image && Storage::disk('public')->exists($struktur->image)) {
                Storage::disk('public')->delete($struktur->image);
            }
            $struktur->delete();

            return redirect()->route('admin.dashboard')->with('deleted', 'Struktur organisasi berhasil dihapus.');
        }

        return redirect()->route('admin.dashboard')->with('deleted', 'Tidak ada data struktur yang bisa dihapus.');
    }
}
