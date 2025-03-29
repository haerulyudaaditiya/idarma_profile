<?php

namespace App\Http\Controllers;

use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    public function index()
    {
        $positions = Position::latest()->get();
        return view('positions.index', compact('positions'));
    }

    public function create()
    {
        $availableStructures = Position::all(); // Untuk dropdown atasan
        return view('positions.create', compact('availableStructures'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_position' => 'required|unique:positions,name_position',
            'serial' => 'required|unique:positions,serial',
            'structure' => 'nullable|string',
        ]);

        if ($request->structure === $request->serial) {
            return back()->withErrors(['structure' => 'Struktur tidak boleh menunjuk pada posisi sendiri'])->withInput();
        }

        Position::create($request->all());

        return redirect()->route('positions.index')->with('success', 'Position berhasil ditambahkan.');
    }

    public function show(Position $position)
    {
        return view('positions.show', compact('position'));
    }

    public function edit(Position $position)
    {
        $availableStructures = Position::where('serial', '!=', $position->serial)->get(); // Hindari menunjuk diri sendiri
        return view('positions.edit', compact('position', 'availableStructures'));
    }

    public function update(Request $request, Position $position)
    {
        $request->validate([
            'name_position' => 'required|unique:positions,name_position,' . $position->id,
            'serial' => 'required|unique:positions,serial,' . $position->id,
            'structure' => 'nullable|string',
        ]);

        if ($request->structure === $request->serial) {
            return back()->withErrors(['structure' => 'Struktur tidak boleh menunjuk pada posisi sendiri'])->withInput();
        }

        $position->update($request->all());

        return redirect()->route('positions.index')->with('success', 'Position berhasil diperbarui.');
    }

    public function destroy(Position $position)
    {
        $position->delete();
        return redirect()->route('positions.index')->with('success', 'Position berhasil dihapus.');
    }
}
