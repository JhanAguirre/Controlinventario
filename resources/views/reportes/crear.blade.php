@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Generar Reporte de Inventario</h1>

        @if(session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <form action="{{ route('reportes.generar') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="tipo_reporte" class="form-label">Tipo de Reporte</label>
                <select class="form-select" id="tipo_reporte" name="tipo_reporte">
                    <option value="general">General</option>
                    <option value="por_bodega">Por Bodega</option>
                    <option value="productos_sin_stock">Productos sin Stock</option>
                    {{-- Puedes agregar más opciones aquí --}}
                </select>
            </div>

            <div id="filtros-bodega" class="mb-3" style="display: none;">
                <label for="bodega_id" class="form-label">Bodega</label>
                <select class="form-select" id="bodega_id" name="bodega_id">
                    <option value="">Seleccionar Bodega</option>
                    @foreach($bodegas as $bodega)
                        <option value="{{ $bodega->id }}">{{ $bodega->nombre }}</option>
                    @endforeach
                </select>
            </div>

            {{-- Puedes agregar más filtros dinámicamente con JavaScript según el tipo de reporte --}}

            <button type="submit" class="btn btn-primary">Generar Reporte</button>
        </form>
    </div>

    <script>
        document.getElementById('tipo_reporte').addEventListener('change', function() {
            const tipoReporte = this.value;
            document.getElementById('filtros-bodega').style.display = tipoReporte === 'por_bodega' ? 'block' : 'none';
            // Agrega lógica similar para otros filtros según el tipo de reporte
        });
    </script>
@endsection