<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolProfile;
use Illuminate\Support\Facades\Storage;

class SchoolProfileController extends Controller
{
    public function index()
    {
        $profilSekolah = SchoolProfile::first();
        return view('admin.profilsekolah.index', compact('profilSekolah'));
    }

    public function store(Request $request)
    {
        if (SchoolProfile::count() > 0) {
            return redirect()->route('admin.profilsekolah.index')->with('error', 'Profil sudah ada, silakan edit.');
        }

        $request->validate([
            'content' => 'nullable|string',
            'sambutan_kepsek' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'banner' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
            'foto_profil' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
            'foto_kepala_sekolah' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
            'motto' => 'nullable|string|max:255',
        ]);

        $data = $request->only(['content', 'motto', 'sambutan_kepsek']);

        if ($request->hasFile('logo')) {
            $data['logo'] = $request->file('logo')->store('profilsekolah', 'public');
        }

        if ($request->hasFile('banner')) {
            $data['banner'] = $request->file('banner')->store('profilsekolah', 'public');
        }

        if ($request->hasFile('foto_profil')) {
            $data['foto_profil'] = $request->file('foto_profil')->store('profilsekolah', 'public');
        }

        if ($request->hasFile('foto_kepala_sekolah')) {
            $data['foto_kepala_sekolah'] = $request->file('foto_kepala_sekolah')->store('profilsekolah', 'public');
        }

        SchoolProfile::create($data);

        return redirect()->route('admin.dashboard')->with('success', 'Profil sekolah berhasil ditambahkan.');
    }

    public function update(Request $request)
    {
        $request->validate([
            'content' => 'nullable|string',
            'sambutan_kepsek' => 'nullable|string',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'banner' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
            'foto_profil' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
            'foto_kepala_sekolah' => 'nullable|image|mimes:jpg,jpeg,png|max:4096',
            'motto' => 'nullable|string|max:255',
        ]);

        $profilSekolah = SchoolProfile::first();
        $data = $request->only(['content', 'motto', 'sambutan_kepsek']);

        if ($request->hasFile('logo')) {
            if ($profilSekolah->logo && Storage::disk('public')->exists($profilSekolah->logo)) {
                Storage::disk('public')->delete($profilSekolah->logo);
            }
            $data['logo'] = $request->file('logo')->store('profilsekolah', 'public');
        }

        if ($request->hasFile('banner')) {
            if ($profilSekolah->banner && Storage::disk('public')->exists($profilSekolah->banner)) {
                Storage::disk('public')->delete($profilSekolah->banner);
            }
            $data['banner'] = $request->file('banner')->store('profilsekolah', 'public');
        }

        if ($request->hasFile('foto_profil')) {
            if ($profilSekolah->foto_profil && Storage::disk('public')->exists($profilSekolah->foto_profil)) {
                Storage::disk('public')->delete($profilSekolah->foto_profil);
            }
            $data['foto_profil'] = $request->file('foto_profil')->store('profilsekolah', 'public');
        }

        if ($request->hasFile('foto_kepala_sekolah')) {
            if ($profilSekolah->foto_kepala_sekolah && Storage::disk('public')->exists($profilSekolah->foto_kepala_sekolah)) {
                Storage::disk('public')->delete($profilSekolah->foto_kepala_sekolah);
            }
            $data['foto_kepala_sekolah'] = $request->file('foto_kepala_sekolah')->store('profilsekolah', 'public');
        }

        $profilSekolah->update($data);

        return redirect()->route('admin.dashboard')->with('updated', 'Profil sekolah berhasil diperbarui.');
    }

    public function destroy(Request $request)
    {
        $type = $request->input('type');
        $profilSekolah = SchoolProfile::first();

        if (!$profilSekolah) {
            return redirect()->route('admin.dashboard')->with('deleted', 'Data tidak ditemukan.');
        }

        $allowed = ['logo', 'banner', 'foto_profil', 'foto_kepala_sekolah', 'motto', 'content', 'sambutan_kepsek'];
        if (!in_array($type, $allowed)) {
            return back()->with('error', 'Tipe penghapusan tidak valid.');
        }

        switch ($type) {
            case 'logo':
                if ($profilSekolah->logo && Storage::disk('public')->exists($profilSekolah->logo)) {
                    Storage::disk('public')->delete($profilSekolah->logo);
                }
                $profilSekolah->update(['logo' => null]);
                return redirect()->route('admin.dashboard', '#edit-logo')->with('deleted', 'Logo berhasil dihapus.');

            case 'banner':
                if ($profilSekolah->banner && Storage::disk('public')->exists($profilSekolah->banner)) {
                    Storage::disk('public')->delete($profilSekolah->banner);
                }
                $profilSekolah->update(['banner' => null]);
                return redirect()->route('admin.dashboard', '#edit-banner')->with('deleted', 'Banner berhasil dihapus.');

            case 'foto_profil':
                if ($profilSekolah->foto_profil && Storage::disk('public')->exists($profilSekolah->foto_profil)) {
                    Storage::disk('public')->delete($profilSekolah->foto_profil);
                }
                $profilSekolah->update(['foto_profil' => null]);
                return redirect()->route('admin.dashboard', '#edit-foto')->with('deleted', 'Foto profil berhasil dihapus.');

            case 'foto_kepala_sekolah':
                if ($profilSekolah->foto_kepala_sekolah && Storage::disk('public')->exists($profilSekolah->foto_kepala_sekolah)) {
                    Storage::disk('public')->delete($profilSekolah->foto_kepala_sekolah);
                }
                $profilSekolah->update(['foto_kepala_sekolah' => null]);
                return redirect()->route('admin.dashboard', '#edit-kepsek')->with('deleted', 'Foto kepala sekolah berhasil dihapus.');

            case 'motto':
                $profilSekolah->update(['motto' => null]);
                return redirect()->route('admin.dashboard', '#edit-motto')->with('deleted', 'Motto berhasil dihapus.');

            case 'content':
                $profilSekolah->update(['content' => null]);
                return redirect()->route('admin.dashboard', '#edit-content')->with('deleted', 'Konten profil berhasil dikosongkan.');

            case 'sambutan_kepsek':
                $profilSekolah->update(['sambutan_kepsek' => null]);
                return redirect()->route('admin.dashboard', '#edit-sambutan')->with('deleted', 'Sambutan kepala sekolah berhasil dihapus.');
        }
    }
}
