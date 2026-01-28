<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectCategoryController extends Controller
{
    public function index()
    {
        $categories = ProjectCategory::orderBy('id')->get();
        return view('admin.project-categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.project-categories.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name_id' => 'required',
            'name_en' => 'required',
        ]);

        $data['slug'] = Str::slug($request->name_en);

        ProjectCategory::create($data);

        return redirect()->route('admin.project-categories.index')
            ->with('success', 'Category berhasil ditambahkan');
    }

    public function edit(ProjectCategory $project_category)
    {
        return view('admin.project-categories.edit', [
            'category' => $project_category
        ]);
    }

    public function update(Request $request, ProjectCategory $project_category)
    {
        $data = $request->validate([
            'name_id' => 'required',
            'name_en' => 'required',
        ]);

        $data['slug'] = Str::slug($request->name_en);

        $project_category->update($data);

        return redirect()->route('admin.project-categories.index')
            ->with('success', 'Category berhasil diupdate');
    }

    public function destroy(ProjectCategory $project_category)
    {
        // optional: cek apakah dipakai project
        if ($project_category->projects()->count() > 0) {
            return back()->with('error', 'Category masih digunakan project');
        }

        $project_category->delete();

        return back()->with('success', 'Category dihapus');
    }
}
