<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolProfile;
use App\Models\Siswa;
use App\Models\Guru;
use Illuminate\Support\Facades\Storage;

class SiswaGuruController extends Controller
{
    public function create()
    {
        $profilSekolah = SchoolProfile::first();
        $siswa = Siswa::first();
        $gurus = Guru::all();
        return view('admin.siswaguru.create', compact('profilSekolah','siswa', 'gurus'));
    }

    public function storeSiswa(Request $request)
    {
        $request->validate([
            'jumlah_siswa' => 'required|integer|min:1',
        ]);

        $siswa = Siswa::first();
        $isSimpanSemua = $request->input('simpan_semua');

        if ($siswa) {
            $siswa->update(['jumlah_siswa' => $request->jumlah_siswa]);
            if ($isSimpanSemua) return response()->noContent();
            return redirect()->route('admin.siswaguru.index')->with('updated', 'Jumlah siswa berhasil diupdate');
        } else {
            Siswa::create(['jumlah_siswa' => $request->jumlah_siswa]);
            if ($isSimpanSemua) return;
            return redirect()->route('admin.siswaguru.index')->with('success', 'Jumlah siswa berhasil ditambahkan');
        }
    }


    public function destroySiswa()
    {
        $siswa = Siswa::first();

        if ($siswa) {
            $siswa->delete();
        }
            return redirect()->back()->with('deleted', 'Jumlah siswa berhasil dihapus');
        
    }


    public function storeGuru(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
            'gambar' => 'required|image|mimes:jpg,jpeg,png|max:3000',
        ]);
    
        $gambarPath = $request->file('gambar')->store('guru', 'public');
    
        Guru::create([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
            'gambar' => $gambarPath,
        ]);
    
        if ($request->input('simpan_semua')) {
            return redirect()->route('admin.siswaguru.index')->with('success', 'Semua data berhasil disimpan');
        }
    
        return redirect()->route('admin.siswaguru.create')->with('success', 'Semua data berhasil disimpan');
    }

    public function indexGuru()
    {
        $profilSekolah = SchoolProfile::first();
        $gurus = Guru::all();
        $siswa = Siswa::first();
        return view('admin.siswaguru.index', compact('gurus', 'siswa','profilSekolah'));
    }

    public function editGuru($id)
    {
        $profilSekolah = SchoolProfile::first();
        $guru = Guru::findOrFail($id);
        $siswa = Siswa::first();
        return view('admin.siswaguru.create', compact('profilSekolah','guru', 'siswa'));
    }

    public function updateGuru(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $guru = Guru::findOrFail($id);

        if ($request->hasFile('gambar')) {
            if ($guru->gambar && Storage::disk('public')->exists($guru->gambar)) {
            Storage::disk('public')->delete($guru->gambar);
            }

            $guru->gambar = $request->file('gambar')->store('guru', 'public');
        }

        $guru->update([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
            'gambar' => $guru->gambar,
        ]);

        return redirect()->route('admin.siswaguru.index')->with('updated', 'Guru berhasil diupdate.');
    }

   public function destroyGuru($id)
    {
        $guru = Guru::findOrFail($id);

        if ($guru->gambar && Storage::disk('public')->exists($guru->gambar)) {
            Storage::disk('public')->delete($guru->gambar);
        }

        $guru->delete();

        return redirect()->route('admin.siswaguru.index')->with('deleted', 'Guru berhasil dihapus.');
    }

}