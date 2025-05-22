@extends('layouts.ferreteria')

@section('content')
    <div class="container py-4">
        <h1 class="text-center text-4xl font-bold text-gray-800 mb-6" style="color: #2D3748;">Centro de Ayuda</h1>
        <p class="text-center text-gray-600 mb-8" style="color: #4A5568;">Encuentra la información que necesitas para resolver tus dudas.</p>

        <div class="row justify-content-center">
            <div class="col-md-6 mb-4">
                <a href="{{ route('ferreteria.quienes-somos') }}" class="card h-100 no-underline text-decoration-none d-block"> {{-- Enlace actualizado --}}
                    <div class="card-body d-flex flex-column justify-content-center align-items-center py-4">
                        <i class="fas fa-users fa-3x text-blue-500 mb-3"></i>
                        <h2 class="text-xl font-semibold text-gray-800 mb-1">Quiénes Somos</h2>
                        <p class="text-gray-700 text-sm mb-0 text-center">Conoce nuestra historia, misión y valores.</p>
                    </div>
                </a>
            </div>
            <div class="col-md-6 mb-4">
                <a href="{{ route('ferreteria.contactenos') }}" class="card h-100 no-underline text-decoration-none d-block"> {{-- Enlace actualizado --}}
                    <div class="card-body d-flex flex-column justify-content-center align-items-center py-4">
                        <i class="fas fa-headset fa-3x text-green-500 mb-3"></i>
                        <h2 class="text-xl font-semibold text-gray-800 mb-1">Contáctenos</h2>
                        <p class="text-gray-700 text-sm mb-0 text-center">Formulario de contacto y datos de soporte.</p>
                    </div>
                </a>
            </div>
            <div class="col-md-6 mb-4">
                 <a href="{{ route('ferreteria.politicas-seguridad') }}" class="card h-100 no-underline text-decoration-none d-block"> {{-- Enlace actualizado --}}
                    <div class="card-body d-flex flex-column justify-content-center align-items-center py-4">
                        <i class="fas fa-shield-alt fa-3x text-red-500 mb-3"></i>
                        <h2 class="text-xl font-semibold text-gray-800 mb-1">Políticas de Seguridad</h2>
                         <p class="text-gray-700 text-sm mb-0 text-center">Conoce cómo protegemos tu información.</p>
                    </div>
                </a>
            </div>
            <div class="col-md-6 mb-4">
                <a href="{{ route('ferreteria.terminos-condiciones') }}" class="card h-100 no-underline text-decoration-none d-block"> {{-- Enlace actualizado --}}
                    <div class="card-body d-flex flex-column justify-content-center align-items-center py-4">
                        <i class="fas fa-file-contract fa-3x text-yellow-500 mb-3"></i>
                        <h2 class="text-xl font-semibold text-gray-800 mb-1">Términos y Condiciones</h2>
                        <p class="text-gray-700 text-sm mb-0 text-center">Reglas de uso de nuestro sistema.</p>
                    </div>
                </a>
            </div>
        </div>
        <div class="text-center mt-5">
            <a href="{{ route('ferreteria.catalogo') }}" class="btn btn-secondary">Volver al Catálogo</a>
        </div>
    </div>

    <style>
        .card.no-underline {
            text-decoration: none;
            color: inherit;
            border: 1px solid #e2e8f0;
            transition: all 0.2s ease-in-out;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .card.no-underline:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .card-body i {
            font-size: 3rem; /* Tamaño de icono más grande */
        }
    </style>
@endsection