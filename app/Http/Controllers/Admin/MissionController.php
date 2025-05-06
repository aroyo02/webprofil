<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mission;

class MissionController extends Controller
{
    public function store(Request $request)
    {
        $request->validate(['mission' => 'required']);

        $mission = Mission::first();
        if ($mission) {
            $mission->update(['content' => $request->mission]);
            $message = 'Data misi berhasil diperbarui';
        } else {
            Mission::create(['content' => $request->mission]);
            $message = 'Data misi berhasil ditambahkan';
        }

        return redirect()->route('admin.dashboard')->with('success', $message);
    }

    public function update(Request $request, $id)
    {
        $request->validate(['mission' => 'required']);

        $mission = Mission::findOrFail($id);
        $mission->update(['content' => $request->mission]);

        return redirect()->route('admin.dashboard')->with('updated', 'Data misi berhasil diperbarui');
    }

    public function destroy($id)
    {
        $mission = Mission::findOrFail($id);
        $mission->delete();

        return redirect()->route('admin.dashboard')->with('deleted', 'Misi berhasil dihapus');
    }

}
