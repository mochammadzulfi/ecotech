<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stat;
use Illuminate\Http\Request;

class StatController extends Controller
{
    public function index()
    {
        $stats = Stat::orderBy('created_at')->get();
        return view('admin.stats.index', compact('stats'));
    }

    public function create()
    {
        return view('admin.stats.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'value' => 'required',
            'label_id' => 'required',
            'label_en' => 'required',
            'icon' => 'nullable|image|max:1024',
        ]);

        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('stats', 'public');
        }

        Stat::create($data);

        return redirect()->route('admin.stats.index')
            ->with('success', 'Stat berhasil ditambahkan');
    }

    public function edit(Stat $home_stat)
    {
        return view('admin.stats.edit', ['stat' => $home_stat]);
    }

    public function update(Request $request, Stat $home_stat)
    {
        $data = $request->validate([
            'value' => 'required',
            'label_id' => 'required',
            'label_en' => 'required',
            'icon' => 'nullable|image|max:1024',
        ]);

        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('stats', 'public');
        }

        $home_stat->update($data);

        return redirect()->route('admin.stats.index')
            ->with('success', 'Stat berhasil diupdate');
    }

    public function destroy(Stat $home_stat)
    {
        $home_stat->delete();

        return back()->with('success', 'Stat dihapus');
    }
}
