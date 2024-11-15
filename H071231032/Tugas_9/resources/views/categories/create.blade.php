@extends('layouts.app')

@section('content')
    <h1 class="text-2xl font-bold mb-6">Add New Category</h1>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block text-sm font-medium">Category Name</label>
            <input type="text" name="name" class="w-full border p-2 rounded" value="{{ old('name') }}">
        </div>

        <div class="mb-4">
            <label class="block text-sm font-medium">Description</label>
            <textarea name="description" class="w-full border p-2 rounded" rows="4">{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Create Category</button>
    </form>
@endsection