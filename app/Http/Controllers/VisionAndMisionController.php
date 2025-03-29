<?php

namespace App\Http\Controllers;

use App\Models\VisionAndMision;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VisionAndMisionController extends Controller
{
    public function index()
    {
        $visions = VisionAndMision::latest()->get();
        return view('vision-and-misions.index', compact('visions'));
    }

    public function create()
    {
        return view('vision-and-misions.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'vision' => 'required|string|max:500',
            'mision' => 'required|string|max:5000',
        ]);

        VisionAndMision::create([
            'id' => Str::uuid(),
            'vision' => $request->vision,
            'mision' => $request->mision,
        ]);

        return redirect()->route('vision-and-misions.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(VisionAndMision $visionAndMision)
    {
        return view('vision-and-misions.edit', compact('visionAndMision'));
    }

    public function update(Request $request, VisionAndMision $visionAndMision)
    {
        $request->validate([
            'vision' => 'required|string|max:500',
            'mision' => 'required|string|max:5000',
        ]);

        $visionAndMision->update([
            'vision' => $request->vision,
            'mision' => $request->mision,
        ]);

        return redirect()->route('vision-and-misions.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(VisionAndMision $visionAndMision)
    {
        $visionAndMision->delete();
        return back()->with('success', 'Data berhasil dihapus.');
    }

    public function visionMision()
    {
        $vision = VisionAndMision::latest()->first(); // ambil satu data terbaru
        return view('pages.sections.vision-and.misions', compact('vision'));
    }
}
