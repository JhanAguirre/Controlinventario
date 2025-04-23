@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-info text-white">
            <h2 class="mb-0">Detalles de Orden #{{ $ordene->id }}</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h4 class="text-primary">Información de la Orden</h4>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Producto:</strong>
                            <span>{{ $ordene->producto->nombre }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Proveedor:</strong>
                            <span>{{ $ordene->proveedor->nombre }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Cantidad:</strong>
                            <span>{{ $ordene->cantidad }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Fecha Orden:</strong>
                            <span>{{ \Carbon\Carbon::parse($ordene->fecha_orden)->format('d/m/Y') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Fecha Entrega:</strong>
                            <span>{{ \Carbon\Carbon::parse($ordene->fecha_entrega_estimada)->format('d/m/Y') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Creado el:</strong>
                            <span>{{ \Carbon\Carbon::parse($ordene->created_at)->format('d/m/Y H:i') }}</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <strong>Actualizado el:</strong>
                            <span>{{ \Carbon\Carbon::parse($ordene->updated_at)->format('d/m/Y H:i') }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="mt-4 d-flex justify-content-between">
                <a href="{{ route('ordenes.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
                <div>
                    <a href="{{ route('ordenes.edit', $ordene->id) }}" class="btn btn-primary mr-2">
                        <i class="fas fa-edit"></i> Editar
                    </a>
                    <form action="{{ route('ordenes.destroy', $ordene->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Eliminar esta orden?')">
                            <i class="fas fa-trash"></i> Eliminar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection