@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Inventario de: {{ $producto->nombre }}</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Bodega</th>
                        <th>Ubicación</th>
                        <th>Cantidad en Bodega</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($producto->bodegas as $bodega)
                        <tr>
                            <td>{{ $bodega->nombre }}</td>
                            <td>{{ $bodega->ubicacion }}</td>
                            <td>
                                <form action="{{ route('inventario.update', $producto) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" name="bodega_id" value="{{ $bodega->id }}">
                                    <div class="input-group input-group-sm" style="width: 120px;">
                                        <input type="number" name="cantidad_en_bodega" class="form-control" value="{{ $bodega->pivot->cantidad_en_bodega }}" required>
                                        <button type="submit" class="btn btn-success">Actualizar</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4">Este producto no está asignado a ninguna bodega.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <a href="{{ route('inventario.index') }}" class="btn btn-secondary mt-3">Volver al Inventario</a>
    </div>
@endsection