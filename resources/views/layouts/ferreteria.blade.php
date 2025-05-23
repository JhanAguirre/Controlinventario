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
        .sidebar {
            background-color: #343a40; /* Gris oscuro, como metal o herramientas */
            color: #f8f9fa; /* Texto claro */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            min-height: calc(100vh - 80px); /* Ajusta la altura para que el sidebar sea visible */
        }
        .sidebar .nav-link {
            color: #adb5bd; /* Gris más claro para los enlaces */
            padding: 10px 15px;
            border-radius: 5px;
            margin-bottom: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
            display: flex;
            align-items: center;
        }
        .sidebar .nav-link:hover {
            background-color: #495057; /* Gris un poco más claro al pasar el ratón */
            color: #ffffff; /* Texto blanco al pasar el ratón */
        }
        .sidebar .nav-link i {
            margin-right: 10px;
            color: #ffc107; /* Amarillo para iconos, como el color de herramientas */
        }
        .sidebar .nav-link:hover i {
            color: #ffffff; /* Icono blanco al pasar el ratón */
        }
        .sidebar .sidebar-title {
            color: #ffc107; /* Amarillo para el título del sidebar */
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
            border-bottom: 1px solid #495057;
            padding-bottom: 10px;
        }
        .main-content-area {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        /* Estilos para los enlaces de información en la barra de navegación superior */
        .navbar-nav .nav-item .nav-link-info {
            color: #495057; /* Color de texto oscuro para los enlaces de información */
            font-weight: 500;
            margin-right: 15px; /* Espacio entre los enlaces */
            transition: color 0.3s ease;
            padding: 0.5rem 0.75rem;
        }
        .navbar-nav .nav-item .nav-link-info:hover {
            color: #007bff; /* Color azul al pasar el ratón */
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
                        {{-- ELIMINADO: Enlace del Carrito de Compras de la barra superior --}}
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
                                    <a class="dropdown-item" href="{{ route('ferreteria.profile.show') }}">
                                        {{ __('Mi Cuenta') }}
                                    </a>
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
                <div class="row">
                    {{-- Sidebar para el usuario de ferretería (solo navegación rápida) --}}
                    <div class="col-md-3">
                        <div class="sidebar">
                            <h4 class="sidebar-title"><i class="fas fa-tools mr-2"></i> Navegación Rápida</h4>
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('ferreteria.catalogo') }}"><i class="fas fa-home"></i> Inicio</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('ferreteria.categorias') }}"><i class="fas fa-boxes"></i> Todas las Categorías</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('ferreteria.marcas') }}"><i class="fas fa-building"></i> Marcas</a>
                                </li>
                                {{-- "Ofertas del Día" ELIMINADO --}}
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('ferreteria.ayuda') }}"><i class="fas fa-question-circle"></i> Ayuda</a>
                                </li>
                                @auth
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('ferreteria.profile.show') }}"><i class="fas fa-user-circle"></i> Mi Cuenta</a>
                                </li>
                                @endauth
                                {{-- AÑADIDO: Enlace para el Carrito en el Sidebar --}}
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('ferreteria.cart.index') }}">
                                        <i class="fas fa-shopping-cart"></i> Carrito
                                        <span class="badge bg-danger ms-1" id="cart-count">0</span>
                                    </a>
                                </li>
                                {{-- FIN AÑADIDO --}}
                            </ul>
                        </div>
                    </div>

                    {{-- Contenido principal de la página --}}
                    <div class="col-md-9">
                        <div class="main-content-area">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Script para actualizar el contador del carrito
        document.addEventListener('DOMContentLoaded', function() {
            function updateCartCount() {
                fetch('{{ route('ferreteria.cart.count') }}') // Asegúrate de que esta ruta exista y devuelva { count: X }
                    .then(response => response.json())
                    .then(data => {
                        const cartCountElement = document.getElementById('cart-count');
                        if (cartCountElement) {
                            cartCountElement.innerText = data.count;
                        }
                    })
                    .catch(error => console.error('Error al obtener el conteo del carrito:', error));
            }

            // Llama a la función al cargar la página
            updateCartCount();

            // Puedes añadir listeners para los formularios de añadir/actualizar/eliminar
            // para llamar a updateCartCount() después de una operación exitosa.
            // Por ejemplo, usando un evento personalizado o interceptando la respuesta de la form.
            document.querySelectorAll('form').forEach(form => {
                form.addEventListener('submit', function(event) {
                    // Si la acción es de carrito, actualiza el contador después de un pequeño retraso
                    if (this.action.includes('/ferreteria/cart')) { // Asegúrate de que la URL coincida con tus rutas de carrito
                        setTimeout(updateCartCount, 500); // Pequeño retraso para que la sesión se actualice
                    }
                });
            });
        });
    </script>
</body>
</html>