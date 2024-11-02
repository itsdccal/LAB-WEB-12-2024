<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - My Website</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        header {
            background-color: black;
            color: #fff;
            position: sticky;
            width: 100%;
            top: 0;
            z-index: 1000;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.3);
        }
        .navbar-brand {
            display: flex;
            align-items: center;
            color: #fff;
        }
        .navbar-brand img {
            width: 150px;
        }
        .navbar-nav .nav-link {
            color: #fff;
            font-size: 1rem;
            transition: color 0.3s ease, transform 0.3s ease;
        }
        .navbar-nav .nav-link:hover {
            color: blue;
            transform: scale(1.1);
        }

        #home-section {
            background: url('{{ asset('images/so.png') }}') no-repeat center center;
            background-size: cover; 
            min-height: 90vh;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            overflow: hidden;
        }
        
        .btn-custom {
            background-color: #ffffff63; 
            color: #002c5b; 
            font-size: 1.2rem; 
            font-weight: bold; 
            padding: 10px 20px;
            border: 2px solid #ffffff; 
            border-radius: 50px; 
            transition: background-color 0.3s ease, transform 0.2s ease;
            margin-top: 450px;
        }
        .btn-custom:hover {
            background-color: #0d02a672; 
            color: rgb(255, 255, 255); 
            transform: scale(1.05); 
        }
        .btn-custom:active {
            background-color: #222;
            transform: scale(0.98); 
        }
        
        footer {
            background-color: black;
            color: #fff;
            padding: 20px 0;
        }
        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .hover-lift:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2); 
        }

        .video-overlay iframe {
            width: 100%;
            height: 100%;
            max-width: 560px;
            max-height: 315px;
        }
        .social-icons a:hover {
        color: #61dafb; 
        transition: color 0.3s ease;
        }

        .about {
            background-color: #C48E0E;
            padding: 40px 0;
        }

        .carousel-inner .carousel-item img {
            height: 500px;
            object-fit: cover;
            border-radius: 10px;
        }

        .carousel-control-prev,
        .carousel-control-next {
            filter: drop-shadow(0px 4px 6px rgba(0, 0, 0, 0.2));
        }

        .custom-control:hover .carousel-control-prev-icon,
        .custom-control:hover .carousel-control-next-icon {
            background-color: rgba(0, 0, 0, 0.8);
        }

        .carousel .carousel-item {
            transition: transform 0.5s ease;
        }

        h1 {
            font-family: 'Playball', cursive;
            color: #ffffff;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        }
    </style>

</head>
<body>

@include('partials.navbar')

<main>
    <section class="text-center">
        <div class="">
            @yield('content')
        </div>
    </section>
</main>

@include('partials.footer')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
