@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        {{-- Columna Principal: Mensaje de Bienvenida y Enlaces Informativos --}}
        <div class="col-md-8 mb-4"> {{-- Ajustado a col-md-8 para la columna principal --}}
            <div class="card shadow-sm border-0 h-100"> {{-- h-100 para que ocupe toda la altura disponible --}}
                <div class="card-body p-5 text-center">
                    <h1 class="display-4 text-primary mb-4">Bienvenido al Sistema de Información</h1>
                    <p class="lead text-muted">
                        Sistema de Control de Inventario
                    </p>
                    <div class="mt-4 mb-6">
                        <i class="fas fa-boxes fa-4x text-primary opacity-25"></i>
                    </div>

                    {{-- Enlaces a las páginas informativas --}}
                    <div class="mt-6">
                        <div class="row">
                            <div class="col-md-6 mb-3"> {{-- Ajuste a col-md-6 para dos columnas de enlaces --}}
                                <a href="{{ route('quienes-somos') }}" class="card h-100 no-underline text-decoration-none d-block">
                                    <div class="card-body d-flex flex-column justify-content-center align-items-center py-3">
                                        <h2 class="text-xl font-semibold text-gray-800 mb-1">Quiénes somos</h2>
                                        <p class="text-gray-700 text-sm mb-0">Conoce nuestra historia y misión.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6 mb-3">
                                <a href="{{ route('contactenos') }}" class="card h-100 no-underline text-decoration-none d-block">
                                    <div class="card-body d-flex flex-column justify-content-center align-items-center py-3">
                                        <h2 class="text-xl font-semibold text-gray-800 mb-1">Contáctenos</h2>
                                        <p class="text-gray-700 text-sm mb-0">Información de contacto y formulario.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6 mb-3">
                                 <a href="{{ route('politicas-seguridad') }}" class="card h-100 no-underline text-decoration-none d-block">
                                    <div class="card-body d-flex flex-column justify-content-center align-items-center py-3">
                                        <h2 class="text-xl font-semibold text-gray-800 mb-1">Políticas de seguridad</h2>
                                         <p class="text-gray-700 text-sm mb-0">Nuestras medidas de protección de datos.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6 mb-3">
                                <a href="{{ route('terminos-condiciones') }}" class="card h-100 no-underline text-decoration-none d-block">
                                    <div class="card-body d-flex flex-column justify-content-center align-items-center py-3">
                                        <h2 class="text-xl font-semibold text-gray-800 mb-1">Términos y condiciones</h2>
                                        <p class="text-gray-700 text-sm mb-0">Condiciones de uso del sistema.</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
/* Estilos adicionales para los cards de información, si no se usan clases de Tailwind */
.card.no-underline {
    text-decoration: none;
    color: inherit; /* Hereda el color del texto para que no se vea como un enlace azul */
    border: 1px solid #e2e8f0; /* Borde suave */
    transition: all 0.2s ease-in-out; /* Transición suave para hover */
}

.card.no-underline:hover {
    transform: translateY(-3px); /* Pequeño efecto de elevación al pasar el ratón */
    box-shadow: 0 8px 16px rgba(0,0,0,0.15); /* Sombra más pronunciada */
}

/* Estilos para el formulario de login (ajustados para Bootstrap y un toque de ferretería) */
.card.shadow-md {
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.form-control.rounded-md {
    border-radius: 0.375rem; /* Tailwind's rounded-md */
}

.btn-primary {
    background-color: #dc3545; /* Rojo de herramientas */
    border-color: #dc3545;
}

.btn-primary:hover {
    background-color: #c82333;
    border-color: #bd2130;
}
</style>
@endsection
