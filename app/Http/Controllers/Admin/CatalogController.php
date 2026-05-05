<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Catalog;
use Illuminate\Support\Facades\Storage;

class CatalogController extends Controller
{
    public function index()
    {
        $catalogs = Catalog::orderBy('created_at', 'desc')->paginate(12);
        return view('admin.catalogs.index', compact('catalogs'));
    }

    public function create()
    {
        $existingCatalogs = \App\Models\Catalog::pluck('product_name')->toArray();

        $products = \App\Models\Production::selectRaw('product_name, SUM(final_quantity) as total_stock')
            ->whereNotIn('product_name', $existingCatalogs)
            ->groupBy('product_name')
            ->get();
            
        return view('admin.catalogs.create', compact('products'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required|string|max:25|unique:catalogs,product_name',
            'description' => 'required|string',
            'price' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0',
            'product_image' => 'required|image|max:2048',
        ]);

        $imagePath = $request->file('product_image')->store('catalogs', 'public');

        Catalog::create([
            'product_name' => $request->product_name,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
            'product_image' => $imagePath,
        ]);

        return redirect()->route('admin.catalogs.index')->with('success', 'Product data has been successfully added.');
    }

    public function show(Catalog $catalog)
    {
        return view('admin.catalogs.show', compact('catalog'));
    }

    public function edit(Catalog $catalog)
    {
        return view('admin.catalogs.edit', compact('catalog'));
    }

    public function update(Request $request, Catalog $catalog)
    {
        $request->validate([
            'product_name' => 'required|string|max:25|unique:catalogs,product_name,' . $catalog->id,
            'description' => 'required|string',
            'price' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0',
            'product_image' => 'nullable|image|max:2048',
        ]);

        $data = $request->only(['product_name', 'description', 'price', 'stock']);

        if ($request->hasFile('product_image')) {
            // Delete old image if it exists
            if ($catalog->product_image) {
                Storage::disk('public')->delete($catalog->product_image);
            }
            $data['product_image'] = $request->file('product_image')->store('catalogs', 'public');
        }

        $catalog->update($data);

        return redirect()->route('admin.catalogs.index')->with('success', 'Product data has been successfully updated.');
    }

    public function destroy(Catalog $catalog)
    {
        $catalog->delete();
        return redirect()->route('admin.catalogs.index')->with('success', 'Product data has been successfully deleted.');
    }
}
