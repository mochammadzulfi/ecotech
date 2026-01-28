<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function edit()
    {
        $contact = Contact::firstOrFail();
        return view('admin.contact.edit', compact('contact'));
    }

    public function update(Request $request)
    {
        $contact = Contact::firstOrFail();

        $data = $request->validate([
            'email'    => 'required|email',
            'phone'    => 'required',
            'map_embed'     => 'required',
        ]);

        $contact->update($data);

        return back()->with('success', 'Contact updated');
    }
}

