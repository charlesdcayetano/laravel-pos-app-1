<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Category;
use App\Models\Supplier;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::latest()->paginate(25);

        return view('products.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        $suppliers = Supplier::get();

        return view('products.create', ['categories' => $categories, 'suppliers' => $suppliers]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $fields = $request->validate([
            'name' => ['required'],
            'brand' => ['required'],
            'color' => ['required'],
            'size' => ['required'],
            'material' => ['required'],
            'price' => ['required'],
            'quantity' => ['required'],
            'description' => ['required'],
            'supplier_id' => ['required', 'numeric'],
            'category_id' => ['required', 'numeric'],
            'image' => ['required', 'file', 'mimes:png,jpg,jpeg,webp', 'max:25000'],
        ]);

        $path = null;
        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('product_images', $request->image);
        }
        
        $fields['image'] = $path;
        Product::create($fields);

        return redirect('/products')->with('message', 'Product created successfully!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $categories = Category::get();
        $suppliers = Supplier::get();
        return view('products.edit', [
            'product' => $product,
            'categories' => $categories,
            'suppliers' => $suppliers
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $fields = $request->validate([
            'name' => ['required'],
            'brand' => ['required'],
            'color' => ['required'],
            'size' => ['required'],
            'material' => ['required'],
            'price' => ['required'],
            'quantity' => ['required'],
            'description' => ['required'],
            'supplier_id' => ['required', 'numeric'],
            'category_id' => ['required', 'numeric'],
            'image' => ['nullable', 'file', 'mimes:png,jpg,jpeg,webp', 'max:25000'],
        ]);

        $path = $product->image;
        if ($request->hasFile('image')) {
            Storage::disk('public')->delete($product->image);
            $path = Storage::disk('public')->put('product_images', $request->image);
        }
        
        $fields['image'] = $path;

        $product->update($fields);

        return redirect()->route('products.index')->with('message', 'Product updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->update(['is_deleted' => true]);

        return redirect()->route('products.index')->with('message', 'Product deleted successfully!');
    }
}
