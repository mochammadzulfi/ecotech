<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PrecisionSection;
use Illuminate\Http\Request;

class PrecisionSectionController extends Controller
{
    public function edit()
    {
        $section = PrecisionSection::with('items')->firstOrFail();
        return view('admin.precision.edit', compact('section'));
    }

    public function update(Request $request)
    {
        $section = PrecisionSection::firstOrFail();

        $data = $request->validate([
            'title_id' => 'required',
            'title_en' => 'required',
            'subtitle_id' => 'nullable',
            'subtitle_en' => 'nullable',
        ]);

        $section->update($data);

        return back()->with('success', 'Precision section updated');
    }
}
