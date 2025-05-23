@extends('layouts.ferreteria')

@section('content')
    <div class="container py-4">
        <h1 class="text-center text-4xl font-bold text-gray-800 mb-6" style="color: #2D3748;"><i class="fas fa-warehouse mr-2"></i> Productos en Bodega: {{ $bodega->nombre }}</h1>
        <p class="text-center text-gray-600 mb-8" style="color: #4A5568;">Ubicación: {{ $bodega->ubicacion }}</p>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row">
            @forelse($productosEnBodega as $product)
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card h-100 shadow-lg border-2 rounded-lg overflow-hidden" style="background-color: rgba(248, 249, 250, 0.9); border-color: #CBD5E0;">
                        <div class="card-header text-center py-3" style="background-color: rgba(226, 232, 240, 0.9); border-bottom: 2px solid #A0AEC0;">
                            <h2 class="text-xl font-bold text-gray-900 mb-0">{{ $product->nombre }}</h2>
                        </div>
                        <div class="card-body d-flex flex-column justify-content-between p-4">
                            <div class="text-center mb-3">
                                <img src="https://placehold.co/150x150/334155/F8FAFC?text=PRODUCTO" alt="Imagen de {{ $product->nombre }}" class="img-fluid rounded-circle mb-3 shadow-md" style="border: 3px solid #4A5568;">
                            </div>
                            <p class="text-gray-700 text-sm mb-2">{{ Str::limit($product->descripcion, 70) }}</p>
                            <p class="text-lg font-bold text-gray-900 mb-2">
                                <i class="fas fa-dollar-sign text-green-600 mr-1"></i> ${{ number_format($product->precio, 2) }}
                            </p>
                            <p class="text-sm text-gray-700">
                                <i class="fas fa-boxes text-blue-500 mr-1"></i> Stock en esta bodega:
                                @if($product->pivot->cantidad_en_bodega > 0)
                                    <span class="badge bg-success">{{ $product->pivot->cantidad_en_bodega }} unidades</span>
                                @else
                                    <span class="badge bg-danger">Agotado en esta bodega</span>
                                @endif
                            </p>
                            <div class="mt-auto text-center">
                                <a href="{{ route('ferreteria.productos.show', $product->id) }}" class="btn btn-sm btn-outline-dark rounded-pill px-4 py-2 font-semibold btn-details-hover-green" style="border-color: #2D3748; color: #2D3748;">
                                    <i class="fas fa-eye mr-2"></i> Ver Detalles
                                </a>
                                {{-- Formulario para añadir al carrito --}}
                                <form action="{{ route('ferreteria.cart.add', $product->id) }}" method="POST" class="d-inline-block ms-2">
                                    @csrf
                                    <input type="hidden" name="quantity" value="1">
                                    <button type="submit" class="btn btn-sm btn-success rounded-pill px-4 py-2" @if($product->pivot->cantidad_en_bodega == 0) disabled @endif>
                                        <i class="fas fa-cart-plus"></i> Añadir
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-gray-600">No hay productos disponibles en esta bodega en este momento.</p>
                </div>
            @endforelse
        </div>

        <div class="d-flex justify-content-center mt-5">
            {{ $productosEnBodega->links() }}
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('ferreteria.bodegas.index') }}" class="btn btn-secondary">
                <i class="fas fa-arrow-left mr-2"></i> Volver a Bodegas
            </a>
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