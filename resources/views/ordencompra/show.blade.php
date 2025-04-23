@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h2>Detalles de Orden #{{ $orden->id }}</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p><strong>Fecha Orden:</strong> 
                        {{ \Carbon\Carbon::parse($orden->fecha_orden)->format('d/m/Y') }}
                    </p>
                    <p><strong>Fecha Entrega:</strong> 
                        {{ \Carbon\Carbon::parse($orden->fecha_entrega_estimada)->format('d/m/Y') }}
                    </p>
                </div>
            </div>
            <div class="mt-4">
                <a href="{{ route('ordenes.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Volver
                </a>
            </div>
        </div>
    </div>
</div>
@endsection