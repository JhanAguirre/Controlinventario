@extends('layouts.ferreteria') {{-- ¡Cambiado a la nueva plantilla! --}}

@section('content')
    <div class="container py-4">
        <h1 class="text-center text-4xl font-bold text-gray-800 mb-6" style="color: #2D3748;">Catálogo de Productos de Ferretería</h1>
        <p class="text-center text-gray-600 mb-8" style="color: #4A5568;">Explora nuestra amplia selección de herramientas y materiales de calidad.</p>

        <div class="row">
            @forelse($productos as $producto)
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card h-100 shadow-lg border-2 rounded-lg overflow-hidden" style="background-color: #F8F9FA; border-color: #CBD5E0;"> {{-- Fondo más claro, borde más definido --}}
                        <div class="card-header text-center py-3" style="background-color: #E2E8F0; border-bottom: 2px solid #A0AEC0;"> {{-- Color de encabezado más sólido --}}
                            <h2 class="text-xl font-bold text-gray-900 mb-0">{{ $producto->nombre }}</h2> {{-- Texto más oscuro y en negrita --}}
                        </div>
                        <div class="card-body d-flex flex-column justify-content-between p-4">
                            <div class="text-center mb-3">
                                {{-- Placeholder de imagen alusiva a ferretería con colores industriales --}}
                                <img src="https://placehold.co/150x150/334155/F8FAFC?text=HERRAMIENTA" alt="Imagen de {{ $producto->nombre }}" class="img-fluid rounded-circle mb-3 shadow-md" style="border: 3px solid #4A5568;"> {{-- Borde más grueso y oscuro --}}
                            </div>
                            <p class="text-gray-700 text-sm mb-2">{{ Str::limit($producto->descripcion, 70) }}</p>
                            <p class="text-lg font-bold text-gray-900 mb-2">
                                <i class="fas fa-dollar-sign text-green-600 mr-1"></i> ${{ number_format($producto->precio, 2) }}
                            </p>
                            <p class="text-sm text-gray-700">
                                <i class="fas fa-boxes text-blue-500 mr-1"></i> Stock Disponible:
                                @if($producto->total_stock_en_bodega > 0)
                                    <span class="badge bg-success">{{ $producto->total_stock_en_bodega }} unidades</span>
                                @else
                                    <span class="badge bg-danger">Agotado</span>
                                @endif
                            </p>
                            <div class="mt-auto text-center">
                                <a href="#" class="btn btn-sm btn-outline-dark rounded-pill px-4 py-2 font-semibold btn-details-hover-green" style="border-color: #2D3748; color: #2D3748;">
                                    <i class="fas fa-eye mr-2"></i> Ver Detalles
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-gray-600">No hay productos disponibles en el catálogo en este momento.</p>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-5">
            {{ $productos->links() }}
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('ferreteria.logout') }}" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
            <form id="logout-form" action="{{ route('ferreteria.logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
        </div>
    </div>

    <style>
        .btn-details-hover-green:hover {
            background-color: #86EFAC !important; /* Verde claro */
            border-color: #86EFAC !important; /* Mismo color para el borde */
            color: #2D3748 !important; /* Mantener el texto oscuro para contraste */
        }
    </style>
@endsection