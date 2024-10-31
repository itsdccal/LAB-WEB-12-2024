<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>@yield('title', 'My Portfolio') - Personal Website</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
<link rel="stylesheet" href="css/style.css">
</head>
<body class="d-flex flex-column min-vh-100">
    @include('partials.navbar')
    
    <main class="flex-grow-1">
        @include('partials.hero')
        <div class="container my-5">
            @yield('content')
        </div>
    </main>

    @include('partials.footer')
    @include('partials.scripts')
</body>
</html>