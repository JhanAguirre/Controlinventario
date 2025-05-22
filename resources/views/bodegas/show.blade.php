@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Detalles de la Bodega</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $bodega->nombre }}</h5>
                <p class="card-text"><strong>Ubicación:</strong> {{ $bodega->ubicacion }}</p>
                <p class="card-text"><strong>Descripción:</strong> {{ $bodega->descripcion }}</p>
            </div>
        </div>

        <a href="{{ route('bodegas.index') }}" class="btn btn-secondary mt-3">Volver a la Lista</a>
    </div>
@endsection