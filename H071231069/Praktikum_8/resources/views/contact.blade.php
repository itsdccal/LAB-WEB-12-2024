@extends('layouts.master')

@section('title', 'Contact')

@section('content')
<section style="background-color: #060657; color: white; min-height: 60vh; display: flex; align-items: center; justify-content: center; position: relative; overflow: hidden; font-family: 'Open Sans', sans-serif;">
    <div class="container" style="text-align: center; max-width: 800px; padding: 20px;">
        
        <p style="font-family: 'Bebas Neue', sans-serif; font-size: 2.5rem; text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.5); margin-bottom: 20px;">
            "What are audiences saying about this film?"
        </p>
        <p style="font-size: 1.2rem; font-weight: 300; color: #e0e0e0; line-height: 1.6;">
            We would love to hear from you. Reach out to us!
        </p>
            <form action="{{ url('/contact') }}" method="POST" style="max-width: 600px; margin: 0 auto; background: rgba(255, 255, 255, 0.1); padding: 2rem; border-radius: 10px; box-shadow: 0 4px 30px rgba(0, 0, 0, 0.236);">
                @csrf
                <div class="mb-3 d-flex align-items-center">
                    <label for="name" class="form-label" style="width: 150px; margin-right: 10px;">Name</label>
                    <input type="text" class="form-control" id="name" name="name" required placeholder="Enter your name" style="background: rgba(255, 255, 255, 0.2); border: none; border-radius: 5px;">
                </div>

                <div class="mb-3 d-flex align-items-center">
                    <label for="email" class="form-label" style="width: 150px; margin-right: 10px;">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required placeholder="Enter your email" style="background: rgba(255, 255, 255, 0.2); border: none; border-radius: 5px;">
                </div>

                <div class="mb-3 d-flex align-items-center">
                    <label for="subject" class="form-label" style="width: 150px; margin-right: 10px;">Subject</label>
                    <input type="text" class="form-control" id="subject" name="subject" required placeholder="Subject of your message" style="background: rgba(255, 255, 255, 0.2); border: none; border-radius: 5px;">
                </div>

                <div class="mb-3 d-flex align-items-start">
                    <label for="message" class="form-label" style="width: 150px; margin-right: 10px;">Message</label>
                    <textarea class="form-control" id="message" name="message" rows="5" required placeholder="Type your message here" style="background: rgba(255, 255, 255, 0.2); border: none; border-radius: 5px;"></textarea>
                </div>

                <button type="submit" class="btn btn-primary w-100" style="background-color: #262cec; border: none; transition: background-color 0.3s;">
                    Send Message
                </button>
            </form>
            
            <div class="text-center mt-4">
                <x-button title="Back to Home" link="{{ url('/') }}" />
            </div>
        </div>
        <div style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-image: url('path/to/your/background-image.jpg'); background-size: cover; background-position: center; opacity: 0.2;"></div>
    </section>
@endsection
