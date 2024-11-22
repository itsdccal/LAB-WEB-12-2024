@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Edit Category</h1>

    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block text-sm font-medium">Category Name</label>
            <input type="text" name="name" class="w-full border p-2 rounded" value="{{ old('name', $category->name) }}" required>
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">Description</label>
            <textarea name="description" class="w-full border p-2 rounded" rows="4">{{ old('description', $category->description) }}</textarea>
        </div>

        <div class="flex justify-start space-x-4">
            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">Update Category</button>
            <a href="{{ route('categories.index') }}" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">Cancel</a>
        </div>
    </form>
@endsection