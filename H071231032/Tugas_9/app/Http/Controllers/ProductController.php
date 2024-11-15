<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\InventoryLog;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric|min:100',
            'stock' => 'required|integer|min:1',
            'description' => 'nullable|string',
        ]);

        $product = Product::create($validated);

        if ($product->stock > 0) {
            InventoryLog::create([
                'product_id' => $product->id,
                'type' => 'restock',
                'quantity' => $product->stock,
                'date' => now(),
            ]);
        }

        return redirect()->route('products.index')->with('success', 'Product created successfully.');
    }

    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    public function edit(Product $product)
    {
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'nullable|exists:categories,id',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
            'description' => 'nullable|string',
        ]);

        $updatedData = array_filter($validated, function ($value, $key) use ($product) {
            return $product->$key != $value;
        }, ARRAY_FILTER_USE_BOTH);
    
        if (empty($updatedData)) {
            return redirect()->route('products.index', $product)->with('info', 'No changes were made.');
        }
    
        $oldStock = $product->stock;
        $newStock = $validated['stock'];
        $product->update($validated);
        
        if ($newStock != $oldStock) {
            $logType = $newStock > $oldStock ? 'restock' : 'sold';
            $quantity = abs($newStock - $oldStock);

            InventoryLog::create([
                'product_id' => $product->id,
                'type' => $logType,
                'quantity' => $quantity,
                'date' => now(),
            ]);
        }

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy(Product $product)
    {
        if ($product->stock == 0) {
            InventoryLog::create([
                'product_id' => $product->id,
                'type' => 'sold',
                'quantity' => $product->stock,
                'date' => now(),
            ]);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }
}