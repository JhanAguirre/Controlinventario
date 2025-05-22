@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Reporte General de Inventario</h1>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Stock Total</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reporteData as $producto)
                        <tr>
                            <td>{{ $producto->nombre }}</td>
                            <td>${{ number_format($producto->precio, 2) }}</td>
                            <td>{{ $producto->total_stock ?? 0 }}</td>
                        </tr>
                    @empty
                        <tr><td colspan="3">No hay productos en el inventario.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <a href="{{ route('reportes.crear') }}" class="btn btn-secondary mt-3">Generar Otro Reporte</a>
    </div>
@endsection