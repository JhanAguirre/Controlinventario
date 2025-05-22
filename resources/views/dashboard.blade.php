@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0">
                <div class="card-body text-center p-5">
                    <h1 class="display-4 text-primary mb-4">Bienvenido al Sistema de Información</h1>
                    <p class="lead text-muted">
                        Sistema de Control de Inventario
                    </p>
                    <div class="mt-4">
                        <i class="fas fa-boxes fa-4x text-primary opacity-25"></i>
                    </div>

                    <div class="mt-6">
                        <div class="row">
                            <div class="col-md-6 mb-4">
                                <a href="{{ route('quienes-somos') }}" class="card h-100 no-underline">
                                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                        <h2 class="text-xl font-semibold text-gray-800 mb-2">Quiénes somos</h2>
                                        <p class="text-gray-700 text-sm">Conoce nuestra historia y misión.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6 mb-4">
                                <a href="{{ route('contactenos') }}" class="card h-100 no-underline">
                                    <div class="card-body d-flex flex-column justify-content-center align-items-center">

                                        <h2 class="text-xl font-semibold text-gray-800 mb-2">Contáctenos</h2>
                                        <p class="text-gray-700 text-sm">Información de contacto y formulario.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6 mb-4">
                                 <a href="{{ route('politicas-seguridad') }}" class="card h-100 no-underline">
                                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                        <h2 class="text-xl font-semibold text-gray-800 mb-2">Políticas de seguridad</h2>
                                         <p class="text-gray-700 text-sm">Nuestras medidas de protección de datos.</p>
                                    </div>
                                </a>
                            </div>
                            <div class="col-md-6 mb-4">
                                <a href="{{ route('terminos-condiciones') }}" class="card h-100 no-underline">
                                    <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                        <h2 class="text-xl font-semibold text-gray-800 mb-2">Términos y condiciones</h2>
                                        <p class="text-gray-700 text-sm">Condiciones de uso del sistema.</p>
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
@endsection




<style>
.card {
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    text-decoration: none;
    border: 1px solid #e2e8f0;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}
.no-underline {
  text-decoration: none;
}
.no-underline:hover {
    text-decoration: none;
}

.card-body {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    height: 100%;
}
</style>
