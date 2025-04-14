@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Detalles del Proveedor</h1>
    <div class="card">
        <div class="card-header">
            Proveedor ID: {{ $proveedor->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $proveedor->nombre }}</h5>
            <p class="card-text">Dirección: {{ $proveedor->direccion }}</p>
            <p class="card-text">Teléfono: {{ $proveedor->telefono }}</p>
            <p class="card-text">Email: {{ $proveedor->email }}</p>
            <a href="{{ route('proveedores.index') }}" class="btn btn-primary">Volver</a>
        </div>
    </div>
</div>
@endsection
