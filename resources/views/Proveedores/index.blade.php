@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Proveedores</h1>
    <a href="{{ route('proveedores.create') }}" class="btn btn-primary">Agregar Proveedor</a>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($proveedores as $proveedor)
                <tr>
                    <td>{{ $proveedor->id }}</td>
                    <td>{{ $proveedor->nombre }}</td>
                    <td>{{ $proveedor->direccion }}</td>
                    <td>{{ $proveedor->telefono }}</td>
                    <td>{{ $proveedor->email }}</td>
                    <td>
                        <a href="{{ route('proveedores.show', $proveedor->id) }}" class="btn btn-info">Ver</a>
                        <a href="{{ route('proveedores.edit', $proveedor->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('proveedores.destroy', $proveedor->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
