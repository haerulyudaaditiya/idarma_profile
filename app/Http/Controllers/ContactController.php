<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::with('service')->latest()->get();
        return view('contacts.index', compact('contacts'));
    }

    public function create()
    {
        $services = Service::all();
        return view('contacts.create', compact('services'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'name'       => 'required|string|max:255',
            'email'      => 'required|email|max:255',
            'telp'       => 'required|string|max:20',
            'message'    => 'required|string|max:255',
        ]);

        Contact::create([
            'id'         => Str::uuid(),
            'service_id' => $request->service_id,
            'name'       => $request->name,
            'email'      => $request->email,
            'telp'       => $request->telp,
            'message'    => $request->message,
        ]);

        return redirect()->to('/#contact')->with('success', 'Pesan berhasil dikirim.');
    }

    public function destroy(Contact $contact)
    {
        $contact->delete();
        return redirect()->route('contacts.index')->with('success', 'Pesan berhasil dihapus.');
    }

    public function show(Contact $contact)
    {
        return view('contacts.show', compact('contact'));
    }
}
