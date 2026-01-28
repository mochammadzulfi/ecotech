<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::orderBy('id')->get();
        return view('admin.services.index', compact('services'));
    }

    public function create()
    {
        return view('admin.services.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title_id' => 'required',
            'title_en' => 'required',
            'short_desc_id' => 'required',
            'short_desc_en' => 'required',
            'description_id' => 'required',
            'description_en' => 'required',
            'image' => 'nullable|image|max:2048',
            //'is_active' => 'nullable|boolean',
        ]);

        $data['slug'] = Str::slug($request->title_en);
        //$data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                ->store('services', 'public');
        }

        Service::create($data);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service berhasil ditambahkan');
    }

    public function edit(Service $service)
    {
        return view('admin.services.edit', compact('service'));
    }

    public function update(Request $request, Service $service)
    {
        $data = $request->validate([
            'title_id' => 'required',
            'title_en' => 'required',
            'short_desc_id' => 'required',
            'short_desc_en' => 'required',
            'description_id' => 'required',
            'description_en' => 'required',
            'image' => 'nullable|image|max:2048',
            //'is_active' => 'nullable|boolean',
        ]);

        $data['slug'] = Str::slug($request->title_en);
        //$data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                ->store('services', 'public');
        }

        $service->update($data);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service berhasil diupdate');
    }

    public function destroy(Service $service)
    {
        $service->delete();
        return back()->with('success', 'Service dihapus');
    }
}
