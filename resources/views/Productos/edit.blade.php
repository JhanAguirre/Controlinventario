@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Producto</h1>
    <form action="{{ route('productos.update', $producto->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ $producto->nombre }}" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" class="form-control">{{ $producto->descripcion }}</textarea>
        </div>
        <div class="form-group">
            <label for="precio">Precio</label>
            <input type="number" name="precio" class="form-control" value="{{ $producto->precio }}" required>
        </div>
        <div class="form-group">
            <label for="cantidad_en_stock">Cantidad en Stock</label>
            type="number" name="cantidad_en_stock" class="form-control" value="{{ $producto->cantidad_en_stock }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
