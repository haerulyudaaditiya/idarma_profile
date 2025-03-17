<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    protected $contact;
    public function __construct(Contact $contact)
    {
        $this->contact=$contact;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('contact.index',[
            'data'=>$this->contact->Index()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:225',
            'email'=>'required|email|max:225',
            'telp'=>'required|numeric|max:20',
            'subject'=>'required',
            'message'=>'required|max:225'
        ]);
        $this->contact->Store([
            'service_id'=>$request->subject,
            'name'=>$request->name,
            'email'=>$request->email,
            'telp'=>$request->telp,
            'message'=>$request->message
        ]);
        return back()->with('success','Pesan anda telah di kirim');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        return view('contact.show',[
            'data'=>$this->contact->Show($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Contact $contact)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|max:225',
            'email'=>'required|email|max:225',
            'telp'=>'required|numeric|max:20',
            'subject'=>'required',
            'message'=>'required|max:225'
        ]);
        $data = [
            'service_id'=>$request->subject,
            'name'=>$request->name,
            'email'=>$request->email,
            'telp'=>$request->telp,
            'message'=>$request->message
        ];
        $this->contact->Edit($id,$data);
        return back()->with('success','Pesan anda telah di kirim');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $this->contact->Trash($id);
        return back()->with('success','Pesan anda telah di kirim');
    }
}
