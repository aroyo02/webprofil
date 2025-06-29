<?php

namespace App\Http\Controllers\Admin;

Use App\Http\Controllers\Controller;
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
        return view('admin.galeri.index', compact('profilSekolah','galeris'));
    }

    public function create()
    {
        return view('admin.galeri.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'files.*' => 'required|mimes:jpg,jpeg,png,mp4,mov,avi|max:51200',
        ]);

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->storeAs('galeri', $filename, 'public');

                $tipe = in_array($file->getClientOriginalExtension(), ['mp4', 'mov', 'avi']) ? 'video' : 'image';

                Galeri::create([
                    'file' => $filename,
                    'tipe' => $tipe,
                ]);
            }
        }

        return redirect()->route('admin.galeri.index')->with('success', 'File berhasil ditambahkan.');
    }

    public function destroy($id)
    {
        $galeri = Galeri::findOrFail($id);
    
        $path = 'galeri/' . $galeri->file;
    
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    
        $galeri->delete();
    
        return redirect()->route('admin.galeri.index')->with('success', 'File berhasil dihapus.');
    }
}