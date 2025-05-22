@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Inventario General</h1>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Stock Total</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($productos as $producto)
                        <tr>
                            <td>{{ $producto->nombre }}</td>
                            <td>${{ number_format($producto->precio, 2) }}</td>
                            <td>{{ $producto->bodegas_sum_cantidad_en_bodega ?? 0 }}</td>
                            <td>
                                <a href="{{ route('inventario.show', $producto->id) }}" class="btn btn-sm btn-info">Ver Detalle</a>
                                <a href="{{ route('inventario.asignar', $producto->id) }}" class="btn btn-sm btn-primary">Asignar</a>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="4">No hay productos en el inventario.</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{ $productos->links() }}
    </div>
@endsection