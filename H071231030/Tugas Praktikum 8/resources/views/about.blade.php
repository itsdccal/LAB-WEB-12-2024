@extends('layouts.master')

@section('title', 'About')

@section('content')
<div class="row">
    <div class="col-md-8 offset-md-2">
        <div class="card shadow-sm">
            <div class="card-body">
                <h2 class="text-center mb-4"><b>About Me</b></h2>
                <div class="row">
                    <div class="col-md-4 text-center mb-4">
                        <div class="profile-wrapper">
                            <div class="profile-border">
                                <img src="{{ asset('img/FOTO-HERO.jpg') }}" alt="Profile" class="rounded-circle img-fluid">
                            </div>
                        </div>
                        <h4 class="mt-3">Rezka Wildan</h4>
                        <p class="text-muted">Web Developer</p>
                    </div>
                    <div class="col-md-8">
                        <h5>Professional Background</h5>
                        <p>
                        I am a Software Developer at Pupuk Kaltim, specializing in creating
                        efficient software solutions that support and streamline industrial
                        operations. My role involves coding, testing, and optimizing systems
                        to ensure they meet organizational needs. With a strong focus on best
                        practices and scalable code, I contribute to the company's digital
                        transformation and continually seek to expand my skills to drive further value.
                        </p>
                        <h5 class="mt-4">Skills</h5>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-unstyled">
                                    <li><i class="fas fa-check-circle text-success me-2"></i>HTML & CSS</li>
                                    <li><i class="fas fa-check-circle text-success me-2"></i>Laravel & PHP</li>
                                    <li><i class="fas fa-check-circle text-success me-2"></i>Java & JavaScript</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-unstyled">
                                    <li><i class="fas fa-check-circle text-success me-2"></i>Python & C++</li>
                                    <li><i class="fas fa-check-circle text-success me-2"></i>Figma & Adobe APP</li>
                                    <li><i class="fas fa-check-circle text-success me-2"></i>Word & Excel</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection