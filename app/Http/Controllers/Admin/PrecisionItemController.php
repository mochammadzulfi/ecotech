<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PrecisionItem;
use Illuminate\Http\Request;

class PrecisionItemController extends Controller
{
    public function create()
    {
        return view('admin.precision.items.create');
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
                ->store('precision', 'public');
        }

        PrecisionItem::create($data);

        return redirect()->route('admin.precision.edit')
            ->with('success', 'Item ditambahkan');
    }

    public function edit(PrecisionItem $home_precision_item)
    {
        return view('admin.precision.items.edit', [
            'item' => $home_precision_item
        ]);
    }

    public function update(Request $request, PrecisionItem $home_precision_item)
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
                ->store('precision', 'public');
        }

        $home_precision_item->update($data);

        return redirect()->route('admin.precision.edit')
            ->with('success', 'Item diupdate');
    }

    public function destroy(PrecisionItem $home_precision_item)
    {
        $home_precision_item->delete();
        return back()->with('success', 'Item dihapus');
    }
}
