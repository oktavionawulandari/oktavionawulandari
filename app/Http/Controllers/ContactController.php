<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;


class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::all();
        return view('contact.index', compact('contacts'));
    }

    public function create()
    {
        return view('home');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:100',
            'email' => 'required|string|max:150',
            'subject' => 'required|max:100',
            'message' => 'required|max:250'
        ]);

        $contacts = Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);
        if ($contacts) {
            return redirect()
                ->route('home')
                ->with(['success' => 'Data kontak telah berhasil ditambahkan']);
        } else {
            return back()
                ->withInput()
                ->with([
                    'error' => 'Terjadi kesalahan, silahkan coba kembali'
                ]);
        }
    }
}