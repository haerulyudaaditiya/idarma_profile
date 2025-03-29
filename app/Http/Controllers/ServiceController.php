<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ServiceController extends Controller
{
    protected $service;
    public function __construct(Service $service)
    {
        $this->service = $service;
    }
    public function index()
    {
        return view('services.index', [
            'services' => $this->service->Index()
        ]);
    }

    public function create()
    {
        return view('services.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name_service' => 'required|string|max:255',
            'icon' => 'required|image|max:2000|mimes:jpeg,png,jpg,heic',
            'description' => 'required|string|max:500',
        ]);

        $iconName = null;

        if ($request->hasFile('icon')) {
            $iconName = $request->file('icon')->store('service/icon', 'public');
        }

        $this->service->Store([
            'name_service' => $request->name_service,
            'icon' => $iconName,
            'description' => $request->description
        ]);

        return redirect()->route('services.index')->with('success', 'Layanan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        return view('services.edit', [
            'service' => $this->service->Show($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name_service' => 'required|string|max:255',
            'img' => 'nullable|image|max:2000|mimes:jpeg,png,jpg,heic',
            'description' => 'required|string|max:500',
        ]);

        $service = $this->service->Show($id);
        $iconName = $service->icon;

        if ($request->hasFile('img')) {
            // Hapus icon lama dari storage
            if ($iconName && Storage::disk('public')->exists($iconName)) {
                Storage::disk('public')->delete($iconName);
            }

            // Simpan icon baru
            $iconName = $request->file('img')->store('service/icon', 'public');
        }

        $this->service->Edit($id, [
            'name_service' => $request->name_service,
            'icon' => $iconName,
            'description' => $request->description
        ]);

        return redirect()->route('services.index')->with('success', 'Layanan berhasil diperbarui.');
    }

    public function destroy(Service $service)
    {
        if ($service->icon && Storage::disk('public')->exists($service->icon)) {
            Storage::disk('public')->delete($service->icon);
        }

        $service->delete();

        return back()->with('success', 'Layanan berhasil dihapus.');
    }
}
