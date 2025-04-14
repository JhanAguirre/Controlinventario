@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Nueva Orden de Compra</h1>
    <form action="{{ route('ordenes.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="producto_id">Producto</label>
            <select name="producto_id" id="producto_id" class="form-control">
                @foreach($productos as $producto)
                <option value="{{ $producto->id }}">{{ $producto->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="proveedor_id">Proveedor</label>
            <select name="proveedor_id" id="proveedor_id" class="form-control">
                @foreach($proveedores as $proveedor)
                <option value="{{ $proveedor->id }}">{{ $proveedor->nombre }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="cantidad">Cantidad</label>
            <input type="number" name="cantidad" id="cantidad" class="form-control">
        </div>
        <div class="form-group">
            <label for="fecha_orden">Fecha de Orden</label>
            <input type="date" name="fecha_orden" id="fecha_orden" class="form-control">
        </div>
        <div class="form-group">
            <label for="fecha_entrega_estimada">Fecha de Entrega Estimada</label>
            <input type="date" name="fecha_entrega_estimada" id="fecha_entrega_estimada" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Crear Orden</button>
    </form>
</div>
@endsection
