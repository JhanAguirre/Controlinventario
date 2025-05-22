@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Asignar Inventario a Bodegas: {{ $producto->nombre }}</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form action="{{ route('inventario.guardarAsignacion', $producto) }}" method="POST">
            @csrf
        
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="table-dark">
                        <tr>
                            <th>Bodega</th>
                            <th>Cantidad a Asignar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($bodegas as $bodega)
                            <tr>
                                <td>{{ $bodega->nombre }}</td>
                                <td>
                                    <input type="number" class="form-control" name="bodegas[{{ $loop->index }}][bodega_id]" value="{{ $bodega->id }}" hidden>
                                    <input type="number" class="form-control" name="bodegas[{{ $loop->index }}][cantidad]" value="{{ $producto->bodegas->find($bodega->id)->pivot->cantidad_en_bodega ?? 0 }}" min="0">
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        
            <button type="submit" class="btn btn-primary mt-3">Guardar Asignación</button>
            <a href="{{ route('inventario.index') }}" class="btn btn-secondary mt-3">Cancelar</a>
        </form>
    </div>
@endsection