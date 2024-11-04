<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <title>@yield('title')</title>
</head>
<body>
    <!--Navbar -->
    @include('partial.navbar')

    <div class="background">
        <div class="overlay"></div>
        @yield('content')
    </div>
    <!--Footer -->
    @include('partial.footer')

</body>
</html>
