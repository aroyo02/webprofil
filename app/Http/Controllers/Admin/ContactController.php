<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolProfile;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $profilSekolah = SchoolProfile::first();
        $kontak = Contact::first(); // Karena hanya 1 data
        return view('admin.contact.index', compact('profilSekolah','kontak'));
    }

    public function create()
    {
        $profilSekolah = SchoolProfile::first();
        $kontak = Contact::first(); // Ambil data pertama jika ada
        return view('admin.contact.create', compact('profilSekolah','kontak'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'alamat' => 'required|string|max:255',
            'jam_operasional' => 'required|string|max:255',
            'telepon' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'maps_embed' => 'required',
        ]);

        Contact::create($validated);

        return redirect()->route('admin.contact.index')->with('success', 'Kontak berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'alamat' => 'required|string|max:255',
            'jam_operasional' => 'required|string|max:255',
            'telepon' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'maps_embed' => 'required',
        ]);

        $kontak = Contact::findOrFail($id);
        $kontak->update($validated);

        return redirect()->route('admin.contact.index')->with('updated', 'Kontak berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $kontak = Contact::findOrFail($id);
        $kontak->delete();

        return redirect()->route('admin.contact.index')->with('deleted', 'Data kontak berhasil dihapus!');
    }

}
