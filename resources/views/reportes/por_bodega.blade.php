@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Reporte de Inventario por Bodega</h1>
        <h2>Bodega: {{ $reporteData->first()->pivot->bodega->nombre ?? 'N/A' }}</h2>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Producto</th>
                        <th>Cantidad en Bodega</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reporteData as $producto)
                        <tr>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->pivot->cantidad_en_bodega }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="2">No hay productos en esta bodega.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <a href="{{ route('reportes.crear') }}" class="btn btn-secondary mt-3">Generar Otro Reporte</a>
    </div>
@endsection