@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Edit Product</h1>

    <form action="{{ route('products.update', $product) }}" method="POST" id="editProductForm">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label class="block text-sm font-medium">Name</label>
            <input type="text" name="name" class="w-full border p-2 rounded" value="{{ $product->name }}" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">Category</label>
            <select name="category_id" class="w-full border p-2 rounded">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $category->id == $product->category_id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">Price (Rp)</label>
            <input type="number" name="price" step="0.01" class="w-full border p-2 rounded" value="{{ $product->price }}" min="0" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">Stock</label>
            <input type="number" name="stock" class="w-full border p-2 rounded" value="{{ $product->stock }}" min="0" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">Description</label>
            <textarea name="description" class="w-full border p-2 rounded" rows="4">{{ $product->description }}</textarea>
        </div>

        <div class="flex justify-start space-x-4">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Update Product</button>
            <a href="{{ route('products.index') }}" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Cancel</a>
        </div>
    </form>

    <script>
        document.getElementById('editProductForm').addEventListener('submit', function(event) {
            var priceInput = document.querySelector('input[name="price"]');
            priceInput.value = priceInput.value.replace(',', '.');
        });
    </script>
@endsection