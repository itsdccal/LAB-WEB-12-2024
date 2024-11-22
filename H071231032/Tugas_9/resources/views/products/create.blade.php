@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Add New Product</h1>

    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-700">Name</label>
            <input type="text" name="name" class="w-full p-2 border rounded" value="{{ old('name') }}">
        </div>
        
        <div class="mb-4">
            <label class="block text-gray-700">Category</label>
            <select name="category_id" class="w-full p-2 border rounded">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Price (Rp)</label>
            <input type="number" name="price" step="0.001" class="w-full p-2 border rounded" value="{{ old('price') }}">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700">Stock</label>
            <input type="number" name="stock" class="w-full p-2 border rounded" value="{{ old('stock') }}">
        </div>

        <div class="mb-6">
            <label class="block text-gray-700">Description</label>
            <textarea name="description" class="w-full p-2 border rounded">{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Save Product</button>
    </form>
@endsection