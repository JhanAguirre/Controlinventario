@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Producto</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $producto->nombre }}</h5>
            <p class="card-text"><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
            <p class="card-text"><strong>Precio:</strong> ${{ number_format($producto->precio, 2) }}</p>
            <p class="card-text"><strong>Stock:</strong> {{ $producto->cantidad_en_stock }}</p>
            <p class="card-text"><small class="text-muted">Creado: {{ $producto->created_at->format('d/m/Y H:i') }}</small></p>
            
            <div class="mt-3">
                <a href="{{ route('productos.edit', $producto->id) }}" class="btn btn-warning">Editar</a>
                <form action="{{ route('productos.destroy', $producto->id) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro?')">Eliminar</button>
                </form>
                <a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver</a>
            </div>
        </div>
    </div>
</div>
@endsection