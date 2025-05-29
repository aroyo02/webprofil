<?php

namespace App\Http\Controllers\Admin;

Use App\Http\Controllers\Controller;
use App\Models\Ekstrakurikuler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EkstrakurikulerController extends Controller
{
    public function index()
    {
        $ekstrakurikulers = Ekstrakurikuler::all();
        return view('admin.ekstrakurikuler.index', compact('ekstrakurikulers'));
    }

    public function create()
    {
        return view('admin.ekstrakurikuler.create');
    }

    public function store(Request $request)
    {
    $request->validate([
        'nama' => 'required',
        'deskripsi' => 'required',
        'logo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    $logoPath = null;
    if ($request->hasFile('logo')) {
        $logoPath = $request->file('logo')->store('ekstrakurikuler', 'public');
    }

    Ekstrakurikuler::create([
        'nama' => $request->nama,
        'deskripsi' => $request->deskripsi,
        'logo' => $logoPath,
    ]);

    return redirect()->route('admin.ekstrakurikuler.index')->with('success', 'Ekstrakurikuler berhasil ditambahkan.');
    }


    public function edit($id)
    {
        $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);
        return view('admin.ekstrakurikuler.create', compact('ekstrakurikuler'));
    }


    public function update(Request $request, $id)
    {
        $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'logo' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('logo')) {
            if ($ekstrakurikuler->logo) {
                Storage::disk('public')->delete($ekstrakurikuler->logo);
            }
            $path = $request->file('logo')->store('ekstrakurikuler', 'public');
            $ekstrakurikuler->logo = $path;
        }

        $ekstrakurikuler->update([
            'nama' => $request->nama,
            'deskripsi' => $request->deskripsi,
            'logo' => $ekstrakurikuler->logo,
        ]);

        return redirect()->route('admin.ekstrakurikuler.index')->with('updated', 'Ekstrakurikuler berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $ekstrakurikuler = Ekstrakurikuler::findOrFail($id);
        if ($ekstrakurikuler->logo) {
            Storage::disk('public')->delete($ekstrakurikuler->logo);
        }
        $ekstrakurikuler->delete();

        return back()->with('deleted', 'Ekstrakurikuler berhasil dihapus.');
    }
}