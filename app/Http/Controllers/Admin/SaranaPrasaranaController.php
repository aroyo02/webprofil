<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolProfile;
use App\Models\SaranaPrasarana;
use Illuminate\Support\Facades\Storage;

class SaranaPrasaranaController extends Controller
{
    // Menampilkan daftar semua data
    public function index()
    {
        $profilSekolah = SchoolProfile::first();
        $data = SaranaPrasarana::all();
        return view('admin.saranaprasarana.index', compact('profilSekolah','data'));
    }

    // Menampilkan form tambah data
    public function create()
    {
        $profilSekolah = SchoolProfile::first();
        $item = null;
        return view('admin.saranaprasarana.create', compact('profilSekolah', 'item'));
    }

    // Menyimpan data baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:3000',
            'deskripsi' => 'required|string',
        ]);

        $gambarPath = $request->file('gambar')->store('saranaprasarana', 'public');

        SaranaPrasarana::create([
            'nama' => $request->nama,
            'gambar' => $gambarPath,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.saranaprasarana.create')->with('success', 'Data berhasil ditambahkan!');
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $profilSekolah = SchoolProfile::first();
        $item = SaranaPrasarana::findOrFail($id);
        return view('admin.saranaprasarana.create', compact('profilSekolah', 'item'));
    }

    // Memperbarui data lama
    public function update(Request $request, $id)
    {
        $item = SaranaPrasarana::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'deskripsi' => 'required|string',
        ]);

        $data = [
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
        ];

        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($item->gambar && Storage::disk('public')->exists($item->gambar)) {
                Storage::disk('public')->delete($item->gambar);
            }

            // Simpan gambar baru
            $data['gambar'] = $request->file('gambar')->store('saranaprasarana', 'public');
        }

        // Update data
        $item->update($data);

        return redirect()->route('admin.saranaprasarana.index')->with('updated', 'Data berhasil diperbarui!');
    }

    // Menghapus data
    public function destroy($id)
    {
        $item = SaranaPrasarana::findOrFail($id);

        if ($item->gambar && Storage::disk('public')->exists($item->gambar)) {
            Storage::disk('public')->delete($item->gambar);
        }

        $item->delete();

        return redirect()->route('admin.saranaprasarana.index')->with('deleted', 'Data berhasil dihapus!');
    }
}
