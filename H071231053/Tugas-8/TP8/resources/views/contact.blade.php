@extends('layouts.master')

@section('title', 'contact')

@section('content')
    <div id="contactContent"class="visible">
        <h1 id="h1con">Contact Us</h1>
        <p id="pcon">Berikan kami saran dan masukkan<br>
                     Pada tombol dibawah ini</p>
        <button id="btncon1" onclick="toggleForm()">Get Started</button>
    </div>
    <div class="container hidden" id="concon">
        <div id="contactForm" class="hidden">
            <h1 id="h1conform">Contact Us</h1>
            <form id="contactFormElement" action="{{ route('contact.submit') }}" method="POST">
                @csrf
                <div>
                    <label for="name">Name:</label><br>
                    <input type="text" id="name" name="name" required><br><br>
                </div>
                <div>
                    <label for="email">Email:</label><br>
                    <input type="email" id="email" name="email" required><br><br>
                </div>
                <div>
                    <label for="message">Message:</label><br>
                    <textarea id="message" name="message" required></textarea><br><br>
                </div>
                <button id="btnconform" class="btnform2" type="button" onclick="toggleForm()">Back</button>
                <button id="btnconform" class="btnform3" type="button" onclick="submitForm()">Send</button>
            </form>
        </div>
    </div>
    <script>
        function toggleForm() {
            const content = document.getElementById('contactContent');
            const conform = document.getElementById('concon');
            const form = document.getElementById('contactForm');
            content.classList.toggle('hidden');
            content.classList.toggle('visible');
            form.classList.toggle('hidden');
            form.classList.toggle('visible');
            conform.classList.toggle('hidden');
            conform.classList.toggle('visible');
        }

        function submitForm() {
            // Send the form data without refreshing the page
            const form = document.getElementById('contactFormElement');
            const formData = new FormData(form);

            fetch("{{ route('contact.submit') }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                    "Accept": "application/json",
                },
                body: formData,
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert("Your message has been sent!");
                    window.location.href = "{{ route('home') }}";
                } else {
                    alert("There was an error sending your message.");
                }
            })
            .catch(error => {
                console.error("Error:", error);
            });
        }
    </script>
@endsection