<?php

namespace App\Http\Controllers;

use App\Models\Organization;
use App\Models\User;
use App\Models\Position;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{
    public function index()
    {
        $organizations = Organization::with(['user', 'position'])->latest()->get();
        return view('organizations.index', compact('organizations'));
    }

    public function create()
    {
        $users = User::where('role', '!=', 'admin')->get(); // Exclude admin
        $positions = Position::all();
        return view('organizations.create', compact('users', 'positions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'position_id' => 'required|exists:positions,id',
        ]);

        $exists = Organization::where('user_id', $request->user_id)
                    ->where('position_id', $request->position_id)
                    ->exists();

        if ($exists) {
            return back()->withErrors(['duplicate' => 'Kombinasi pengguna dan posisi ini sudah ada.'])->withInput();
        }

        Organization::create($request->only('user_id', 'position_id'));

        return redirect()->route('organizations.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(Organization $organization)
    {
        $users = User::where('role', '!=', 'admin')->get();
        $positions = Position::all();
        return view('organizations.edit', compact('organization', 'users', 'positions'));
    }

    public function update(Request $request, Organization $organization)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'position_id' => 'required|exists:positions,id',
        ]);

        $exists = Organization::where('user_id', $request->user_id)
                    ->where('position_id', $request->position_id)
                    ->where('id', '!=', $organization->id)
                    ->exists();

        if ($exists) {
            return back()->withErrors(['duplicate' => 'Kombinasi pengguna dan posisi ini sudah ada.'])->withInput();
        }

        $organization->update($request->only('user_id', 'position_id'));

        return redirect()->route('organizations.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(Organization $organization)
    {
        $organization->delete();
        return back()->with('success', 'Data berhasil dihapus.');
    }
}
