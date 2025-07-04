<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolProfile;
use App\Models\Prestasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PrestasiController extends Controller
{
    public function index()
    {
        $profilSekolah = SchoolProfile::first();
        $prestasis = Prestasi::all();
        return view('admin.prestasi.index', compact('profilSekolah', 'prestasis'));
    }

    public function create()
    {
        $profilSekolah = SchoolProfile::first();
        return view('admin.prestasi.create', compact('profilSekolah'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $gambarPath = null;
        if ($request->hasFile('gambar')) {
            $gambarPath = $request->file('gambar')->store('prestasi', 'public');
        }

        Prestasi::create([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $gambarPath,
        ]);

        return redirect()->route('admin.prestasi.create')->with('success', 'Prestasi berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $profilSekolah = SchoolProfile::first();
        $prestasi = Prestasi::findOrFail($id);
        return view('admin.prestasi.create', compact('profilSekolah', 'prestasi'));
    }

    public function update(Request $request, $id)
    {
        $prestasi = Prestasi::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            if ($prestasi->gambar) {
                Storage::disk('public')->delete($prestasi->gambar);
            }
            $path = $request->file('gambar')->store('prestasi', 'public');
            $prestasi->gambar = $path;
        }

        $prestasi->update([
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'gambar' => $prestasi->gambar,
        ]);

        return redirect()->route('admin.prestasi.index')->with('updated', 'Prestasi berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $prestasi = Prestasi::findOrFail($id);
        if ($prestasi->gambar) {
            Storage::disk('public')->delete($prestasi->gambar);
        }
        $prestasi->delete();

        return back()->with('deleted', 'Prestasi berhasil dihapus.');
    }
}
