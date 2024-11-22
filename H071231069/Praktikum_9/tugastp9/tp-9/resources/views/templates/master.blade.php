<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Master</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link href="https://fonts.googleapis.com/css2?family=Spicy+Rice&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <style>
        /* Navbar styling */
        .navbar {
            background: #4e0303;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            padding: 0.8rem 1rem;
        }

        .navbar-brand {
            font-size: 1.8rem;
            font-weight: bold;
            color: #ffffff;
            display: flex;
            align-items: center;
        }

        .navbar-brand img {
            height: 60px;
            width: 60px;
            margin-right: 10px;
            border-radius: 50%;
            border: 2px solid #ffffff;
        }

        .navbar-nav .nav-link {
            color: #ffffff;
            font-size: 1rem;
            font-family: 'Roboto', sans-serif;
            margin-right: 15px;
            transition: color 0.3s ease, transform 0.3s ease;
            position: relative;
        }

        .navbar-nav .nav-link:hover {
            color: #ffcd00;
            transform: scale(1.1);
        }

        .navbar-nav .nav-link::after {
            content: '';
            display: block;
            width: 0%;
            height: 2px;
            background: #ffcd00;
            transition: width 0.3s ease;
            position: absolute;
            bottom: -5px;
            left: 0;
        }

        .navbar-nav .nav-link:hover::after {
            width: 100%;
        }

        .navbar-toggler {
            border-color: rgba(255, 255, 255, 0.5);
        }

        .navbar-toggler-icon {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3E%3Cpath stroke='rgba%28255, 255, 255, 0.5%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }

        body {
            background-color: #f7f9fc;
            font-family: 'Poppins', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            padding-top: 70px;
        }

        .container {
            flex: 1;
        }

        .header-button {
            margin-top: 120px;
            padding: 20px;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.1);
        }

        .table thead th {
            background-color: #460404;
            color: #ffffff;
        }

        footer {
            background-color: #4e0303;
            color: #ffffff;
            text-align: center;
            padding: 10px;
            position: relative;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>
    <!-- Navbar Section -->
    <header>
        <nav class="navbar navbar-expand-lg fixed-top">
            <div class="container">
                <a class="navbar-brand" href="#">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo">
                    Product Management
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('category.index') }}">Category</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('product.index') }}">Product</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('inventory-log.index') }}">Inventory Log</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    @include('components/message')


    <!-- Content Section -->
    <div class="container-fluid mt-3">
        <div class="header-button">
            @yield('header-button')
            @yield('content')
        </div>
    </div>

    <!-- Sticky Footer -->
    <footer class="fixed-bottom">
        <p>&copy; 2024 Product Management System. All rights reserved.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
