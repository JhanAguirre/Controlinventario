<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Ferretería Online') }}</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        body {
            background-color: #f0f2f5; /* Un gris claro para el fondo general */
        }
        .main-content-area-full { /* Nuevo estilo para el contenido sin sidebar */
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            min-height: calc(100vh - 120px); /* Ajusta la altura */
        }
        /* Estilos de la barra de navegación superior (copiados de layouts/ferreteria.blade.php) */
        .navbar-nav .nav-item .nav-link-info {
            color: #495057;
            font-weight: 500;
            margin-right: 15px;
            transition: color 0.3s ease;
            padding: 0.5rem 0.75rem;
        }
        .navbar-nav .nav-item .nav-link-info:hover {
            color: #007bff;
        }
        .navbar-collapse .navbar-nav.me-auto {
            align-items: center;
        }
        @media (max-width: 767.98px) {
            .navbar-collapse .navbar-nav.me-auto {
                flex-direction: column;
                align-items: flex-start;
            }
            .navbar-nav .nav-item .nav-link-info {
                margin-right: 0;
                width: 100%;
            }
        }
    </style>
</head>
<body class="font-sans antialiased bg-light">
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <i class="fas fa-wrench text-dark mr-2"></i> {{ config('app.name', 'Ferretería Online') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse d-md-flex" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link nav-link-info" href="{{ route('quienes-somos') }}">Quiénes Somos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-info" href="{{ route('contactenos') }}">Contáctenos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-info" href="{{ route('politicas-seguridad') }}">Políticas de Seguridad</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link nav-link-info" href="{{ route('terminos-condiciones') }}">Términos y Condiciones</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ms-auto">
                        @guest
                            @if (Route::has('ferreteria.login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('ferreteria.login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="fas fa-user-circle mr-1"></i> {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('ferreteria.logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form-ferreteria').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form-ferreteria" action="{{ route('ferreteria.logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            <div class="container">
                <div class="row justify-content-center"> {{-- Centrar el contenido --}}
                    <div class="col-md-10"> {{-- Columna para el contenido principal --}}
                        <div class="main-content-area-full">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>