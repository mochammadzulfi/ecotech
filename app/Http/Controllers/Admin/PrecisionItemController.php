<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PrecisionItem;
use App\Models\PrecisionSection;
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
            'label_id' => 'required|string',
            'label_en' => 'required|string',
        ]);

        // asumsi cuma ada 1 precision section
        $data['precision_section_id'] = PrecisionSection::first()->id;

        PrecisionItem::create($data);

        return redirect()
            ->route('admin.precision.edit')
            ->with('success', 'Precision item ditambahkan');
    }

    public function edit(PrecisionItem $precision_item)
    {
        return view('admin.precision.items.edit', [
            'item' => $precision_item
        ]);
    }

    public function update(Request $request, PrecisionItem $precision_item)
    {
        $data = $request->validate([
            'label_id' => 'required|string',
            'label_en' => 'required|string',
        ]);

        $precision_item->update($data);

        return redirect()
            ->route('admin.precision.edit')
            ->with('success', 'Precision item diperbarui');
    }

    public function destroy(PrecisionItem $precision_item)
    {
        $precision_item->delete();

        return back()->with('success', 'Precision item dihapus');
    }
}
