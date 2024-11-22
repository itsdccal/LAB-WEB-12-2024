<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">

    @include('partials.navbar')

    <div class="container mx-auto py-8">
        @include('partials.alert')
        @yield('content')
    </div>

</body>
</html>