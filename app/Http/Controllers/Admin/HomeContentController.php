<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeContent;
use Illuminate\Http\Request;

class HomeContentController extends Controller
{
    public function edit()
    {
        $content = HomeContent::firstOrFail();
        return view('admin.home.edit', compact('content'));
    }

    public function update(Request $request)
    {
        $content = HomeContent::firstOrFail();

        $data = $request->validate([
            'hero_title_id' => 'required',
            'hero_title_en' => 'required',
            'hero_subtitle_id' => 'nullable',
            'hero_subtitle_en' => 'nullable',
            'hero_cta_text_id' => 'nullable',
            'hero_cta_text_en' => 'nullable',
            'hero_cta_link' => 'nullable',
            'hero_image' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('hero_image')) {
            $data['hero_image'] = $request->file('hero_image')
                ->store('home', 'public');
        }

        $content->update($data);

        return back()->with('success', 'Home content updated');
    }
}
