<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENHYPEN</title>
    <link rel="stylesheet" href="{{ asset ('styles/style.css') }}">

</head>

<body>
    @include('partials.navbar')

    <div>
        @yield('content')
    </div>
    
    @include('partials.footer')
</body>

</html>