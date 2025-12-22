<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title ?? 'Car Project' }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .navbar { border-bottom: 3px solid #0d6efd; }
        footer { background-color: #212529; color: white; }
    </style>
  </head>
  <body class="d-flex flex-column h-100">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark p-3 shadow">
      <div class="container">
        <a class="navbar-brand fw-bold" href="/">CAR PROJECT</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link {{ request()->is('manufacturers*') ? 'active' : '' }}" href="{{ route('manufacturers.index') }}">Manufacturers</a>
            </li>
            <li class="nav-item">
              <a class="nav-link {{ request()->is('cars*') ? 'active' : '' }}" href="{{ route('cars.index') }}">Cars</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <main class="flex-shrink-0">
      <div class="container mt-5">
        @yield('content')
      </div>
    </main>

    <footer class="footer mt-auto py-4 text-center">
      <div class="container">
        <span class="text-white">&copy; 2025 - Car Manufacturer Project - Favour Obidiaso</span>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>