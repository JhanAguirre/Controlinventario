@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Bodegas</h1>

        <a href="{{ route('bodegas.create') }}" class="btn btn-primary mb-3">Crear Nueva Bodega</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Ubicación</th>
                        <th>Descripción</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bodegas as $bodega)
                        <tr>
                            <td>{{ $bodega->id }}</td>
                            <td>{{ $bodega->nombre }}</td>
                            <td>{{ $bodega->ubicacion }}</td>
                            <td>{{ $bodega->descripcion }}</td>
                            <td>
                                <a href="{{ route('bodegas.show', $bodega->id) }}" class="btn btn-sm btn-info">Ver Detalle</a>
                                <a href="{{ route('bodegas.edit', $bodega->id) }}" class="btn btn-sm btn-warning">Editar</a>
                                <form action="{{ route('bodegas.destroy', $bodega->id) }}" method="POST" class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta bodega?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection