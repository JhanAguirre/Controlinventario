@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles de la Orden de Compra</h1>
    <div class="card">
        <div class="card-header">
            Orden #{{ $orden->id }}
        </div>
        <div class="card-body">
            <p><strong>Producto:</strong> {{ $orden->producto->nombre }}</p>
            <p><strong>Proveedor:</strong> {{ $orden->proveedor->nombre }}</p>
            <p><strong>Cantidad:</strong> {{ $orden->cantidad }}</p>
            <p><strong>Fecha de Orden:</strong> {{ $orden->fecha_orden }}</p>
            <p><strong>Fecha de Entrega Estimada:</strong> {{ $orden->fecha_entrega_estimada }}</p>
            <a href="{{ route('ordenes.index') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>
</div>
@endsection
