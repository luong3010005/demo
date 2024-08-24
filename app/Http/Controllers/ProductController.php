<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products_index', compact('products'));
    }

    public function index1()
    {
        $products = Product::all();
        return view('fonend.list_product', compact('products'));
    }

    public function create()
    {
        return view('admin.products_add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'short_description' => 'nullable|string',
            'long_description' => 'nullable|string',
            'sale_price' => 'nullable|numeric|min:0',
            'image_url' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        if ($request->hasFile('image_url')) {
            $imagePath = $request->file('image_url')->store('images', 'public');
            $validated['image_url'] = $imagePath;
        }

        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Product added successfully.');
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('fonend.showproduct', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('admin.products_edit', compact('product'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'short_description' => 'nullable|string',
            'long_description' => 'nullable|string',
            'sale_price' => 'nullable|numeric|min:0',
            'image_url' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        $product = Product::findOrFail($id);

        if ($request->hasFile('image_url')) {
            $imagePath = $request->file('image_url')->store('images', 'public');
            $validated['image_url'] = $imagePath;
        } else {
            $validated['image_url'] = $product->image_url; // Keep the existing image
        }

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}
