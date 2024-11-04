<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Samsung | @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        *::selection {
            background-color: black;
            color: white;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #e9ecef;
        }
    </style>
</head>
<body class="bg-gray-100 text-gray-900">
    @include('partials.navbar')
    <!-- Content -->
    <main class="container mx-auto py-6 px-4">
        @yield('content')
    </main>
    @include('partials.footer')
</body>
</html>