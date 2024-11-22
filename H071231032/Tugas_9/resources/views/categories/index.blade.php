@extends('layouts.app')

@section('content')
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Categories</h1>
        <a href="{{ route('categories.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Add Category</a>
    </div>

    <table class="min-w-full bg-white shadow-md rounded">
        <thead>
            <tr>
                <th class="py-3 px-6 bg-gray-100">Name</th>
                <th class="py-3 px-6 bg-gray-100">Description</th>
                <th class="py-3 px-6 bg-gray-100">Products</th>
                <th class="py-3 px-6 bg-gray-100">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr class="border-b text-center">
                    <td class="py-3 px-6">{{ $category->name }}</td>
                    <td class="py-3 px-6">{{ $category->description ?? 'No description' }}</td>
                    <td class="py-3 px-6">
                        @php
                            $productNames = $category->products->pluck('name')->implode(', ');
                            $productNames = Str::limit($productNames, 30);
                        @endphp
                        {{ $productNames ?: 'No products' }}
                    </td>
                    <td class="py-3 px-6 flex justify-center space-x-2">
                        <a href="{{ route('categories.edit', $category) }}" class="text-yellow-400 font-medium transition duration-200 border-b-2 border-transparent hover:border-yellow-400">
                            Edit
                        </a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this category?');">
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