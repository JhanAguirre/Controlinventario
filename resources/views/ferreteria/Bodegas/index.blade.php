@extends('layouts.ferreteria')

@section('content')
    <div class="container py-4">
        <h1 class="text-center text-4xl font-bold text-gray-800 mb-6" style="color: #2D3748;"><i class="fas fa-warehouse mr-2"></i> Nuestras Bodegas</h1>
        <p class="text-center text-gray-600 mb-8" style="color: #4A5568;">Explora los productos disponibles en cada una de nuestras ubicaciones.</p>

        <div class="row justify-content-center">
            @forelse($bodegas as $bodega)
                <div class="col-md-6 col-lg-4 mb-4">
                    <a href="{{ route('ferreteria.bodegas.show', $bodega->id) }}" class="card h-100 shadow-sm border-0 rounded-lg text-decoration-none text-dark d-block">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center py-4">
                            <i class="fas fa-map-marker-alt fa-3x text-primary mb-3"></i>
                            <h2 class="text-xl font-semibold text-gray-800 mb-1">{{ $bodega->nombre }}</h2>
                            <p class="text-gray-700 text-sm mb-0 text-center">{{ Str::limit($bodega->ubicacion, 80) }}</p>
                            <small class="text-muted mt-2">Ver productos disponibles</small>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-gray-600">No hay bodegas registradas en este momento.</p>
                </div>
            @endforelse
        </div>

        <div class="text-center mt-5">
            <a href="{{ route('ferreteria.catalogo') }}" class="btn btn-secondary">Volver al Catálogo</a>
        </div>
    </div>
@endsection