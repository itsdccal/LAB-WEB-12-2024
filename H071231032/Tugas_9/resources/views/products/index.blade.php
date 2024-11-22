@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Products</h1>
        <a href="{{ route('products.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add Product</a>
    </div>

    <table class="min-w-full bg-white shadow-md rounded">
        <thead>
            <tr>
                <th class="py-3 px-6 bg-gray-100">Name</th>
                <th class="py-3 px-6 bg-gray-100">Description</th>
                <th class="py-3 px-6 bg-gray-100">Category</th>
                <th class="py-3 px-6 bg-gray-100">Price</th>
                <th class="py-3 px-6 bg-gray-100">Stock</th>
                <th class="py-3 px-6 bg-gray-100">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr class="border-b text-center">
                    <td class="py-3 px-6">{{ $product->name }}</td>
                    <td class="py-3 px-6">{{ $product->description ?? 'No Description'}}</td>
                    <td class="py-3 px-6">{{ $product->category->name ?? 'No Category' }}</td>
                    <td class="py-3 px-6">Rp{{ number_format($product->price, 2, ',', '.') }}</td>
                    <td class="py-3 px-6">{{ $product->stock }}</td>
                    <td class="py-3 px-6 flex justify-center space-x-4">
                        <a href="{{ route('products.edit', $product) }}" 
                        class="text-yellow-400 font-medium transition duration-200 border-b-2 border-transparent hover:border-yellow-400">
                            Edit
                        </a>
                        
                        <form action="{{ route('products.destroy', $product) }}" method="POST" 
                            onsubmit="return confirm('Are you sure you want to delete this product?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 font-medium transition duration-200 border-b-2 border-transparent hover:border-red-500">
                                Delete
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection