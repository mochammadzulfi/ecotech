<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CtaSection;
use Illuminate\Http\Request;

class CtaSectionController extends Controller
{
    public function edit()
    {
        $cta = CtaSection::firstOrFail();
        return view('admin.cta.edit', compact('cta'));
    }

    public function update(Request $request)
    {
        $cta = CtaSection::firstOrFail();

        $data = $request->validate([
            'title_id'        => 'required',
            'title_en'        => 'required',
            'desc_id'         => 'nullable',
            'desc_en'         => 'nullable',
            'button_text_id'  => 'required',
            'button_text_en'  => 'required',
            'button_link'     => 'required',
            'background'      => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('background')) {
            $data['background'] = $request->file('background')
                ->store('cta', 'public');
        }

        $cta->update($data);

        return back()->with('success', 'CTA Section updated');
    }
}
