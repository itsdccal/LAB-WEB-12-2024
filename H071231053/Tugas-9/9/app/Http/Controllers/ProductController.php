<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\InventoryLog;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $category = Category::all();
        $query = Product::with('category');
        
        if ($request->has('category_id') && $request->category_id != '') {
            $query->where('category_id', $request->category_id);
        }
    
        $products = $query->paginate(10); // Renamed to $products
        
        return view('product', compact('products', 'category'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validasi input
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'price' => 'required|numeric|min:0.01',
                'stock' => 'required|integer|min:0',
                'category_id' => 'required|exists:category,id',
            ]);
    
            // Simpan data produk
            $product = Product::create($validated);
    
            // Tambahkan log untuk produk baru
            InventoryLog::create([
                'product_id' => $product->id,
                'type' => 'new',
                'quantity' => $product->stock,
                'date' => now(),
            ]);
    
            return redirect()->route('product.index')->with('success', 'Produk berhasil ditambahkan.');
    
        } catch (\Exception $e) {
            // Tangkap error dan kembalikan ke view dengan pesan error
            return redirect()->back()->withErrors('Terjadi kesalahan saat menambahkan produk: ' . $e->getMessage());
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        try {
            // Validasi input
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'price' => 'required|numeric|min:0',
                'stock' => 'required|integer|min:0',
                'category_id' => 'required|exists:category,id',
            ]);
    
            // Simpan data lama untuk mengecek perubahan stok
            $oldStock = $product->stock;
            
            // Update produk
            $product->update($validated);
    
            // Log otomatis jika stok berubah
            if ($product->stock < $oldStock) {
                InventoryLog::create([
                    'product_id' => $product->id,
                    'type' => 'sold',
                    'quantity' => $oldStock - $product->stock,
                    'date' => now(),
                ]);
            } elseif ($product->stock > $oldStock) {
                InventoryLog::create([
                    'product_id' => $product->id,
                    'type' => 'restock',
                    'quantity' => $product->stock - $oldStock,
                    'date' => now(),
                ]);
            }
    
            return redirect()->route('product.index')->with('success', 'Produk berhasil diperbarui.');
    
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Terjadi kesalahan saat memperbarui produk: ' . $e->getMessage());
        }
    }
    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        try {
            // Hapus produk
            $product->delete();
    
            return redirect()->route('product.index')->with('success', 'Produk berhasil dihapus.');
    
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Terjadi kesalahan saat menghapus produk: ' . $e->getMessage());
        }
    }
}
