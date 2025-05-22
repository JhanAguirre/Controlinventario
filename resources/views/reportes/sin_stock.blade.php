@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Reporte de Productos sin Stock</h1>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Producto</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($reporteData as $producto)
                        <tr>
                            <td>{{ $producto->nombre }}</td>
                        </tr>
                    @empty
                        <tr><td>No hay productos sin stock. ¡Excelente!</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <a href="{{ route('reportes.crear') }}" class="btn btn-secondary mt-3">Generar Otro Reporte</a>
    </div>
@endsection