<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SchoolProfile;
use App\Models\Vision;
use App\Models\Mission;

class VisionController extends Controller
{
    public function index()
    {
        $profilSekolah = SchoolProfile::first();
        $vision = Vision::first();
        $mission = Mission::first();
        return view('admin.visimisi.index', compact('profilSekolah','vision', 'mission'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'vision' => 'required'
        ]);

        // Jika sudah ada data visi, update
        $vision = Vision::first();
        if ($vision) {
            $vision->update(['content' => $request->vision]);
            $message = 'Data visi berhasil diperbarui';
        } else {
            Vision::create(['content' => $request->vision]);
            $message = 'Data visi berhasil ditambahkan';
        }

        return redirect()->route('admin.dashboard')->with('success', $message);
    }

    public function update(Request $request, $id)
    {
        $request->validate(['vision' => 'required']);

        $vision = Vision::findOrFail($id);
        $vision->update(['content' => $request->vision]);

        return redirect()->route('admin.dashboard')->with('updated', 'Data visi berhasil diperbarui');
    }

    public function destroy($id)
    {
        $vision = Vision::findOrFail($id);
        $vision->delete();

        return redirect()->route('admin.dashboard')->with('deleted', 'Visi berhasil dihapus');
    }


    public function saveAll(Request $request)
    {
        $request->validate([
            'vision' => 'required',
            'mission' => 'required'
        ]);

        $vision = Vision::first();
        $mission = Mission::first();

        if ($vision) {
            $vision->update(['content' => $request->vision]);
        } else {
            Vision::create(['content' => $request->vision]);
        }

        if ($mission) {
            $mission->update(['content' => $request->mission]);
        } else {
            Mission::create(['content' => $request->mission]);
        }

        return redirect()->route('admin.dashboard')->with('updated', 'Visi dan Misi berhasil disimpan');
    }
}
