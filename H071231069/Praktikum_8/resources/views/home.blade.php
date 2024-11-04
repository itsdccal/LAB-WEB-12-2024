@extends('layouts.master')

@section('title', 'Home')

@section('content')
    <div class="">
        <section id="home-section">
            <div class="py-5 text-center">
                <a href="{{ url('/about') }}" class="btn btn-custom">Learn More</a>
            </div>
        </section>
    </div>
@endsection
