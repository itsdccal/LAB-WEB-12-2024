<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mendapatkan semua kategori dengan pagination
        $category = Category::paginate(10);
    
        // Kembalikan view dengan data kategori
        return view('category', compact('category'));
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
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
            ]);
    
            Category::create($validated);
    
            return redirect()->route('category.index')->with('success', 'Kategori berhasil ditambahkan.');
    
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Terjadi kesalahan saat menambahkan kategori: ' . $e->getMessage());
        }
    }
    
    public function update(Request $request, Category $category)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
            ]);
    
            $category->update($validated);
    
            return redirect()->route('category.index')->with('success', 'Kategori berhasil diperbarui.');
    
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Terjadi kesalahan saat memperbarui kategori: ' . $e->getMessage());
        }
    }
    
    public function destroy(Category $category)
    {
        try {
            $category->delete();
    
            return redirect()->route('category.index')->with('success', 'Kategori berhasil dihapus.');
    
        } catch (\Exception $e) {
            return redirect()->back()->withErrors('Terjadi kesalahan saat menghapus kategori: ' . $e->getMessage());
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

}
