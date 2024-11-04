@extends('layouts.master')

@section('title', 'Home')

@section('content')
    <!-- Hero Section -->
    <section class="relative bg-gray-800 text-white py-20 rounded-md overflow-hidden">
        <video autoplay loop muted playsinline class="absolute inset-0 w-full h-full object-cover opacity-50">
            <source src="https://images.samsung.com/id/smartphones/galaxy-s24-ultra/videos/galaxy-s24-ultra-highlights-form-factor-tb.webm?imbypass=true" type="video/mp4">
        </video>
        <div class="relative z-10 text-center">
            <h1 class="text-5xl font-bold">Galaxy S24 Ultra</h1>
            <p class="mt-4 text-lg">Unleash whole new levels of creativity, productivity, and possibility.</p>
            <a href="#" class="inline-block mt-6 bg-blue-600 hover:bg-blue-700 text-white font-semibold px-6 py-3 rounded">Buy now</a>
        </div>
    </section>

    <!-- Features Section -->
    <section class="mt-10">
        <h2 class="text-2xl font-bold mb-6 text-center">Features</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white shadow rounded-lg p-6 text-center">
                <img src="{{ asset('images/s24.png') }}" alt="Feature 1" class="h-40 mx-auto">
                <h5 class="text-lg font-semibold mt-4">200 MP + 50 MP + 12 MP + 10 MP Main Camera</h5>
            </div>
            <div class="bg-white shadow rounded-lg p-6 text-center">
                <img src="{{ asset('images/AI.png') }}" alt="Feature 2" class="h-40 mx-auto">
                <h5 class="text-lg font-semibold mt-4">Galaxy AI</h5>
            </div>
            <div class="bg-white shadow rounded-lg p-6 text-center">
                <img src="{{ asset('images/snapdragon.png') }}" alt="Feature 3" class="h-40 mx-auto">
                <h5 class="text-lg font-semibold mt-4">Snapdragon 8 Gen 3</h5>
            </div>
        </div>
    </section>
@endsection