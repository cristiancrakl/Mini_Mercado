<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    {{-- Cargar Bootstrap y scripts compilados con Vite --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">

    <!-- Custom Styles -->
    <style>
        .bg-gradient-primary {
            background: linear-gradient(135deg, #007bff 0%, #28a745 100%);
        }

        .hero-section {
            display: flex;
            align-items: center;
            padding: 5rem 0;
        }

        html,
        body {
            height: 100%;
            margin: 0;
            padding: 0;
        }

        body {
            display: flex;
            flex-direction: column;
            background: transparent;
        }

        main {
            flex: 1 0 auto;
            background: linear-gradient(135deg, #007bff 0%, #28a745 100%);
        }

        footer {
            flex-shrink: 0;
        }
    </style>
</head>

<body>

    <main class="text-white">
        <!-- Hero Section -->
        <div class="hero-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 text-center">
                        <h1 class="display-4 mb-3">
                            <i class="bi bi-shop me-2"></i>{{ config('app.name', 'Minimercado') }}
                        </h1>
                        <p class="lead mb-4">Tu tienda en línea confiable para productos frescos y de calidad.</p>
                        <p class="mb-4">Regístrate o inicia sesión para gestionar tu minimercado de manera eficiente.
                        </p>
                        <div class="d-flex justify-content-center gap-3 flex-wrap">
                            @if (Route::has('login'))
                            <a href="{{ route('login') }}" class="btn btn-light btn-lg">
                                <i class="bi bi-box-arrow-in-right me-2"></i>Iniciar Sesión
                            </a>
                            @endif
                            @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-outline-light btn-lg">
                                <i class="bi bi-person-plus me-2"></i>Registrarse
                            </a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center py-3">
        <div class="container">
            <p class="mb-0">&copy; {{ date('Y') }} {{ config('app.name', 'Minimercado') }}. Todos los derechos
                reservados.</p>
        </div>
    </footer>

</body>

</html>