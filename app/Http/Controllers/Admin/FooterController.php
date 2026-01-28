<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterContent;
use Illuminate\Http\Request;

class FooterController extends Controller
{
    public function edit()
    {
        $footer = FooterContent::firstOrFail();
        return view('admin.footer.edit', compact('footer'));
    }

    public function update(Request $request)
    {
        $footer = FooterContent::firstOrFail();

        $data = $request->validate([
            'company_name' => 'required',
            'about_id'     => 'required',
            'about_en'     => 'required',
            'address_id'   => 'required',
            'address_en'   => 'required',
            'email'        => 'required|email',
            'phone'        => 'required',
        ]);

        $footer->update($data);

        return back()->with('success', 'Footer updated');
    }
}

