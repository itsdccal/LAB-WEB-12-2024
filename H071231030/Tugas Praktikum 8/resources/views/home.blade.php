@extends('layouts.master')

@section('title', 'Home')

@section('content')
<section class="hero-section text-center">
    <div class="container">
        <h1 class="display-4">Hello im Rezka Wildan</h1>
        <h1 class="display-4">Welcome to My Work Portofolio</h1>
        <p class="lead">At Here you can see how good my Portfolio is</p>
        <div class="mt-4">
            <a href="{{ route('about') }}" class="btn btn-light btn-lg me-3">Learn More</a>
            <a href="{{ route('contact') }}" class="btn btn-outline-light btn-lg">Contact Me</a>
        </div>
    </div>
</section>

<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="text-center mb-4">How Professional am I?</h2>
                <div class="row g-4">
                    <div class="col-md-4">
                        <div class="text-center">
                            <i class="fas fa-laptop-code fa-3x mb-3 text-primary"></i>
                            <h4>Web Development</h4>
                            <p>Creating responsive and dynamic websites using modern technologies.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center">
                            <i class="fas fa-mobile-alt fa-3x mb-3 text-primary"></i>
                            <h4>Mobile Design</h4>
                            <p>Designing user-friendly interfaces for mobile applications.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center">
                            <i class="fas fa-database fa-3x mb-3 text-primary"></i>
                            <h4>Database Design</h4>
                            <p>Structuring efficient and scalable database solutions.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center">
                            <i class="fas fa-server fa-3x mb-3 text-primary"></i>
                            <h4>Backend Development</h4>
                            <p>Building robust server-side applications and APIs.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center">
                            <i class="fas fa-paint-brush fa-3x mb-3 text-primary"></i>
                            <h4>UI/UX Design</h4>
                            <p>Creating beautiful and intuitive user experiences.</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="text-center">
                            <i class="fas fa-shield-alt fa-3x mb-3 text-primary"></i>
                            <h4>Security Implementation</h4>
                            <p>Implementing robust security measures and best practices.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection