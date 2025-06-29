<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolProfile;
use App\Models\Berita;
use Illuminate\Support\Facades\Storage;

class BeritaController extends Controller
{
    public function index()
    {
        $profilSekolah = SchoolProfile::first();
        $beritas = Berita::latest()->get();
        return view('admin.berita.index', compact('profilSekolah','beritas'));
    }

    public function create($id = null)
    {
        $berita = $id ? Berita::findOrFail($id) : null;
        return view('admin.berita.create', compact('berita'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'deskripsi' => 'required',
        ]);

        $berita = Berita::create([
            'judul' => $validated['judul'],
            'deskripsi' => $validated['deskripsi'],
            'gambar' => null // default null dulu
        ]);

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('berita', 'public');
            $berita->gambar = $path;
            $berita->save();
        }

        return redirect()->route('admin.berita.index')->with('success', 'Berita berhasil ditambahkan');
    }

    public function show($id)
    {
        $berita = Berita::findOrFail($id);
        return view('admin.berita.show', compact('berita'));
    }

    public function update(Request $request, $id)
    {
        $berita = Berita::findOrFail($id);

        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'deskripsi' => 'required',
        ]);

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
                Storage::disk('public')->delete($berita->gambar);
            }

            $validated['gambar'] = $request->file('gambar')->store('berita', 'public');
        }

        $berita->update($validated);
        return redirect()->route('admin.berita.index')->with('updated', 'Berita berhasil diupdate');
    }

    public function destroy($id)
{
    $berita = Berita::findOrFail($id);


    if ($berita->gambar && Storage::disk('public')->exists($berita->gambar)) {
        Storage::disk('public')->delete($berita->gambar);
    }

        $berita->delete();
        return redirect()->route('admin.berita.index')->with('deleted', 'Berita berhasil dihapus');
    }
}
