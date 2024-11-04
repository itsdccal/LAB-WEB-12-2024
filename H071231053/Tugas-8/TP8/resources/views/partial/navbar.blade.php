<link rel="stylesheet" href="{{ asset('css/navbar.css') }}">

<nav class="navbar">
    <div class="logo">
      <img src="images/logo.png" alt="Logo"> <!-- Ganti logo.png dengan URL atau path gambar logo -->
    </div>
    <ul>
      <li><a href="{{ route('home') }}">Home</a></li>
      <li><a href="{{ route('about') }}">About</a></li>
      <li><a href="{{ route('contact') }}">Contact Us</a></li>
    </ul>
  </nav>