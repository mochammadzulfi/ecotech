<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->latest()->get();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = ProductCategory::orderBy('name_en')->get();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'category_id'      => 'required',
            'name_id'          => 'required',
            'name_en'          => 'required',
            'short_desc_id'    => 'required',
            'short_desc_en'    => 'required',
            'specs'            => 'nullable|array',
            'image'            => 'required|image|max:2048',
            'is_featured'      => 'nullable|boolean',
        ]);

        $data['slug'] = Str::slug($request->name_en);
        $data['specs'] = array_values(array_filter($request->specs ?? []));
        $data['is_featured'] = $request->boolean('is_featured');

        $data['image'] = $request->file('image')
            ->store('products', 'public');

        Product::create($data);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product berhasil ditambahkan');
    }

    public function edit(Product $product)
    {
        $categories = ProductCategory::orderBy('name_en')->get();
        return view('admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $data = $request->validate([
            'category_id'      => 'required',
            'name_id'          => 'required',
            'name_en'          => 'required',
            'short_desc_id'    => 'required',
            'short_desc_en'    => 'required',
            'specs'            => 'nullable|array',
            'image'            => 'nullable|image|max:2048',
            'is_featured'      => 'nullable|boolean',
        ]);

        $data['slug'] = Str::slug($request->name_en);
        $data['specs'] = array_values(array_filter($request->specs ?? []));
        $data['is_featured'] = $request->boolean('is_featured');

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')
                ->store('products', 'public');
        }

        $product->update($data);

        return redirect()->route('admin.products.index')
            ->with('success', 'Product berhasil diupdate');
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return back()->with('success', 'Product dihapus');
    }
}

