@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Producto</h1>
    <div class="card">
        <div class="card-header">
            {{ $producto->nombre }}
        </div>
        <div class="card-body">
            <p><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
            <p><strong>Precio:</strong> {{ $producto->precio }}</p>
            <p><strong>Cantidad en Stock:</strong> {{ $producto->cantidad_en_stock }}</p>
            <a href="{{ route('productos.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</div>
@endsection
