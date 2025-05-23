@extends('layouts.ferreteria')

@section('content')
    <div class="container py-4">
        <h1 class="text-center text-4xl font-bold text-gray-800 mb-6" style="color: #2D3748;">Todas las Categorías</h1>
        <p class="text-center text-gray-600 mb-8" style="color: #4A5568;">Explora nuestros productos por categoría.</p>

        <div class="row justify-content-center">
            @forelse($categories as $category)
                <div class="col-md-4 col-sm-6 mb-4">
                    <a href="{{ route('ferreteria.productos.byCategory', $category->slug) }}" class="card h-100 shadow-sm border-0 rounded-lg text-decoration-none text-dark d-block">
                        <div class="card-body d-flex flex-column justify-content-center align-items-center py-4">
                            <i class="fas fa-folder fa-3x text-info mb-3"></i> {{-- Icono de carpeta para categoría --}}
                            <h2 class="text-xl font-semibold text-gray-800 mb-1">{{ $category->name }}</h2>
                            <p class="text-gray-700 text-sm mb-0 text-center">{{ Str::limit($category->description, 80) }}</p>
                        </div>
                    </a>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p class="text-gray-600">No hay categorías disponibles en este momento.</p>
                </div>
            @endforelse
        </div>

        <div class="text-center mt-5">
            <a href="{{ route('ferreteria.catalogo') }}" class="btn btn-secondary">Volver al Catálogo</a>
        </div>
    </div>
@endsection