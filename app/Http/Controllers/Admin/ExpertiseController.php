<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Expertise;
use Illuminate\Http\Request;

class ExpertiseController extends Controller
{
    public function index()
    {
        $expertises = Expertise::orderBy('id')->get();
        return view('admin.expertise.index', compact('expertises'));
    }

    public function create()
    {
        return view('admin.expertise.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title_id' => 'required',
            'title_en' => 'required',
            'desc_id'  => 'required',
            'desc_en'  => 'required',
            'icon'     => 'nullable|image|max:1024',
        ]);

        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')
                ->store('expertise', 'public');
        }

        Expertise::create($data);

        return redirect()->route('admin.expertise.index')
            ->with('success', 'Expertise berhasil ditambahkan');
    }

    public function edit(Expertise $home_expertise)
    {
        return view('admin.expertise.edit', [
            'expertise' => $home_expertise
        ]);
    }

    public function update(Request $request, Expertise $home_expertise)
    {
        $data = $request->validate([
            'title_id' => 'required',
            'title_en' => 'required',
            'desc_id'  => 'required',
            'desc_en'  => 'required',
            'icon'     => 'nullable|image|max:1024',
        ]);

        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')
                ->store('expertise', 'public');
        }

        $home_expertise->update($data);

        return redirect()->route('admin.expertise.index')
            ->with('success', 'Expertise berhasil diupdate');
    }

    public function destroy(Expertise $home_expertise)
    {
        $home_expertise->delete();
        return back()->with('success', 'Expertise dihapus');
    }
}
