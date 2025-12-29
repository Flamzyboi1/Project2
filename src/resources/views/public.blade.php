<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle Inventory</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    @viteReactRefresh
    @vite(['resources/js/app.jsx'])
</head>
<body class="bg-light">
    <nav class="navbar navbar-dark bg-primary shadow-sm mb-4">
        <div class="container d-flex justify-content-between">
            <span class="navbar-brand fw-bold">Vehicle Inventory</span>
            <a href="/login" class="btn btn-outline-light btn-sm">Admin Login</a>
        </div>
    </nav>

    <div id="public-app"></div>

    <footer class="text-center py-4 bg-dark text-white mt-5">
        <p class="mb-0">Favour Obidiaso, 2025</p>
    </footer>
</body>
</html>