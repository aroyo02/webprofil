<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GaleriPustaka;
use App\Models\SchoolProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriPustakaController extends Controller
{
    public function index()
    {
        $profilSekolah = SchoolProfile::first();
        $bukus = GaleriPustaka::latest()->get();
        return view('admin.galeripustaka.index', compact('bukus', 'profilSekolah'));
    }

    public function create()
    {
        $profilSekolah = SchoolProfile::first();
        return view('admin.galeripustaka.create', compact('profilSekolah'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer',
            'stok' => 'required|integer|min:1',
            'kategori' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'sampul' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $sampulPath = $request->file('sampul')->store('galeripustaka', 'public');

        GaleriPustaka::create([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'stok' => $request->stok,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'sampul' => $sampulPath,
        ]);

        return redirect()->route('admin.galeripustaka.create')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $profilSekolah = SchoolProfile::first();
        $buku = GaleriPustaka::findOrFail($id);
        return view('admin.galeripustaka.create', compact('buku', 'profilSekolah'));
    }

    public function update(Request $request, $id)
    {
        $buku = GaleriPustaka::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'penulis' => 'required|string|max:255',
            'penerbit' => 'required|string|max:255',
            'tahun_terbit' => 'required|integer',
            'stok' => 'required|integer|min:1',
            'kategori' => 'required|string|max:100',
            'deskripsi' => 'nullable|string',
            'sampul' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->hasFile('sampul')) {
            Storage::disk('public')->delete($buku->sampul);
            $sampulPath = $request->file('sampul')->store('galeripustaka', 'public');
            $buku->sampul = $sampulPath;
        }

        $buku->update([
            'judul' => $request->judul,
            'penulis' => $request->penulis,
            'penerbit' => $request->penerbit,
            'tahun_terbit' => $request->tahun_terbit,
            'stok' => $request->stok,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'sampul' => $buku->sampul,
        ]);

        return redirect()->route('admin.galeripustaka.index')->with('updated', 'Buku berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $buku = GaleriPustaka::findOrFail($id);
        Storage::disk('public')->delete($buku->sampul);
        $buku->delete();

        return back()->with('deleted', 'Buku berhasil dihapus.');
    }
}
