@extends('layouts.master')

@section('title', 'Contact Us')

@section('content')
    <section class="bg-white shadow-md rounded-lg p-8 mt-8 mb-24">
        <h2 class="text-3xl font-bold mb-4 text-center">Contact Us</h2>
        <form>
            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                <input type="text" id="name" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" id="email" class="mt-1 block w-full p-2 border border-gray-300 rounded-md">
            </div>
            <div class="mb-4">
                <label for="message" class="block text-sm font-medium text-gray-700">Message</label>
                <textarea id="message" rows="5" class="mt-1 block w-full p-2 border border-gray-300 rounded-md resize-none"></textarea>
            </div>
            <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700">Submit</button>
        </form>
    </section>
@endsection