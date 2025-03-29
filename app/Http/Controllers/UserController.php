<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::latest()->get();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'role' => 'required|in:admin,user',
            'img' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'twiter' => 'nullable|string|max:255',
            'facebok' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
        ]);

        $data = $request->only([
            'name',
            'email',
            'role',
            'twiter',
            'facebok',
            'instagram',
            'linkedin'
        ]);

        $data['id'] = \Illuminate\Support\Str::uuid();
        $data['password'] = Hash::make($request->password);

        if ($request->hasFile('img')) {
            $data['img'] = $request->file('img')->store('users', 'public');
        }

        User::create($data);

        return redirect()->route('users.index')->with('success', 'User berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'role' => 'required|in:admin,user',
            'img' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'twiter' => 'nullable|string|max:255',
            'facebok' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'linkedin' => 'nullable|string|max:255',
        ]);

        $data = $request->only([
            'name',
            'email',
            'role',
            'twiter',
            'facebok',
            'instagram',
            'linkedin'
        ]);

        // Jika user upload foto baru
        if ($request->hasFile('img')) {
            // Hapus foto lama jika ada
            if ($user->img && Storage::disk('public')->exists($user->img)) {
                Storage::disk('public')->delete($user->img);
            }

            // Simpan foto baru
            $data['img'] = $request->file('img')->store('users', 'public');
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'User berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        // Hapus foto dari storage jika ada
        if ($user->img && Storage::disk('public')->exists($user->img)) {
            Storage::disk('public')->delete($user->img);
        }

        // Hapus data user
        $user->delete();

        return redirect()->route('users.index')->with('success', 'User berhasil dihapus.');
    }
}
