<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolProfile;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GaleriController extends Controller
{
    public function index()
    {
        $profilSekolah = SchoolProfile::first();
        $galeris = Galeri::latest()->get();
        return view('admin.galeri.index', compact('profilSekolah', 'galeris'));
    }

    public function create()
    {
        $profilSekolah = SchoolProfile::first();
        return view('admin.galeri.create', compact('profilSekolah'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'files.*' => 'required|mimes:jpg,jpeg,png,mp4,mov,avi|max:51200',
            'judul.*' => 'required|string|max:255',
        ]);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $i => $file) {
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('galeri', $filename, 'public');

                $tipe = in_array($file->getClientOriginalExtension(), ['mp4', 'mov', 'avi']) ? 'video' : 'image';

                Galeri::create([
                    'file' => $filename,
                    'tipe' => $tipe,
                    'judul' => $request->judul[$i] ?? '',
                ]);
            }
        }

        return redirect()->route('admin.galeri.create')->with('success', 'File berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $profilSekolah = SchoolProfile::first();
        $galeri = Galeri::findOrFail($id);
        $edit = true;
        return view('admin.galeri.create', compact('profilSekolah', 'galeri', 'edit'));
    }

    public function update(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'file' => 'nullable|mimes:jpg,jpeg,png,mp4,mov,avi|max:51200',
        ]);

        $data = ['judul' => $request->judul];

        if ($request->hasFile('file')) {
            // Hapus file lama
            if ($galeri->file && Storage::disk('public')->exists('galeri/' . $galeri->file)) {
                Storage::disk('public')->delete('galeri/' . $galeri->file);
            }

            $file = $request->file('file');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('galeri', $filename, 'public');

            $data['file'] = $filename;
            $data['tipe'] = in_array($file->getClientOriginalExtension(), ['mp4', 'mov', 'avi']) ? 'video' : 'image';
        }

        $galeri->update($data);

        return redirect()->route('admin.galeri.index')->with('updated', 'Galeri berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);
        $path = 'galeri/' . $galeri->file;

        if ($galeri->file && Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }

        $galeri->delete();

        return redirect()->route('admin.galeri.index')->with('deleted', 'File berhasil dihapus.');
    }
}
