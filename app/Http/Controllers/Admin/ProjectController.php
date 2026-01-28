<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::with('category')->latest()->get();
        return view('admin.projects.index', compact('projects'));
    }

    public function create()
    {
        $categories = ProjectCategory::orderBy('name_en')->get();
        return view('admin.projects.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'project_category_id' => 'nullable',
            'title_id'            => 'required',
            'title_en'            => 'required',
            'location_id'         => 'required',
            'location_en'         => 'required',
            'short_desc_id'       => 'nullable',
            'short_desc_en'       => 'nullable',
            'excerpt_id'          => 'required',
            'excerpt_en'          => 'required',
            'image'               => 'required|image|max:2048',
        ]);

        $data['slug'] = Str::slug($request->title_en);
        $data['image'] = $request->file('image')
            ->store('projects', 'public');

        Project::create($data);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project berhasil ditambahkan');
    }

    public function edit(Project $project)
    {
        $categories = ProjectCategory::orderBy('name_en')->get();
        return view('admin.projects.edit', compact('project', 'categories'));
    }

    public function update(Request $request, Project $project)
    {
        $data = $request->validate([
            'project_category_id' => 'nullable',
            'title_id'            => 'required',
            'title_en'            => 'required',
            'location_id'         => 'required',
            'location_en'         => 'required',
            'short_desc_id'       => 'nullable',
            'short_desc_en'       => 'nullable',
            'excerpt_id'          => 'required',
            'excerpt_en'          => 'required',
            'image'               => 'nullable|image|max:2048',
        ]);

        $data['slug'] = Str::slug($request->title_en);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                ->store('projects', 'public');
        }

        $project->update($data);

        return redirect()->route('admin.projects.index')
            ->with('success', 'Project berhasil diupdate');
    }

    public function destroy(Project $project)
    {
        $project->delete();
        return back()->with('success', 'Project dihapus');
    }
}
