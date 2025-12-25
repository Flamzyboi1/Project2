<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* This matches the bright blue header in the slides */
        .navbar-custom {
            background-color: #007bff; 
        }
        .navbar-custom .navbar-brand, .navbar-custom .nav-link {
            color: white !important;
            font-weight: bold;
        }
        footer {
            background-color: #212529;
            color: white;
            padding: 40px 0;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-custom mb-4">
        <div class="container">
            <a class="navbar-brand" href="/">CAR PROJECT</a>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('cars.index') }}">Cars</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('manufacturers.index') }}">Manufacturers</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('car_types.index') }}">Car Types</a></li>
                </ul>
                <ul class="navbar-nav ms-auto">
                    @guest
                        <li class="nav-item"><a class="nav-link btn btn-outline-light ms-2" href="{{ route('login') }}">Login</a></li>
                    @else
                        <li class="nav-item"><span class="nav-link">Welcome, {{ Auth::user()->name }}</span></li>
                        <li class="nav-item">
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-link nav-link">Logout</button>
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <main class="container">
        @yield('content')
    </main>

    <footer class="text-center">
        <div class="container">
            <p>Favour Obidiaso, 2025</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>