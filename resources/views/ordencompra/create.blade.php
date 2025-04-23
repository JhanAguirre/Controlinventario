@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">Crear Nueva Orden de Compra</h2>
        </div>
        <div class="card-body">
            <form action="{{ route('ordenes.store') }}" method="POST">
                @csrf

                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="producto_id">Producto *</label>
                        <select name="producto_id" id="producto_id" class="form-control @error('producto_id') is-invalid @enderror" required>
                            <option value="">Seleccione un producto</option>
                            @foreach($productos as $producto)
                                <option value="{{ $producto->id }}" {{ old('producto_id') == $producto->id ? 'selected' : '' }}>
                                    {{ $producto->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('producto_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label for="proveedor_id">Proveedor *</label>
                        <select name="proveedor_id" id="proveedor_id" class="form-control @error('proveedor_id') is-invalid @enderror" required>
                            <option value="">Seleccione un proveedor</option>
                            @foreach($proveedores as $proveedor)
                                <option value="{{ $proveedor->id }}" {{ old('proveedor_id') == $proveedor->id ? 'selected' : '' }}>
                                    {{ $proveedor->nombre }}
                                </option>
                            @endforeach
                        </select>
                        @error('proveedor_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="cantidad">Cantidad *</label>
                        <input type="number" name="cantidad" id="cantidad" 
                               class="form-control @error('cantidad') is-invalid @enderror" 
                               value="{{ old('cantidad') }}" min="1" required>
                        @error('cantidad')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="fecha_orden">Fecha Orden *</label>
                        <input type="date" name="fecha_orden" id="fecha_orden" 
                               class="form-control @error('fecha_orden') is-invalid @enderror" 
                               value="{{ old('fecha_orden', now()->format('Y-m-d')) }}" required>
                        @error('fecha_orden')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group col-md-4">
                        <label for="fecha_entrega_estimada">Fecha Entrega *</label>
                        <input type="date" name="fecha_entrega_estimada" id="fecha_entrega_estimada" 
                               class="form-control @error('fecha_entrega_estimada') is-invalid @enderror" 
                               value="{{ old('fecha_entrega_estimada') }}" required>
                        @error('fecha_entrega_estimada')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group text-right">
                    <a href="{{ route('ordenes.index') }}" class="btn btn-secondary mr-2">
                        <i class="fas fa-times"></i> Cancelar
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Guardar Orden
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection