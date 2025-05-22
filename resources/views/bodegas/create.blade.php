@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Crear Nueva Bodega</h1>

        <form action="{{ route('bodegas.store') }}" method="POST">
            @csrf  <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                @error('nombre')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="ubicacion" class="form-label">Ubicación</label>
                <input type="text" class="form-control" id="ubicacion" name="ubicacion" value="{{ old('ubicacion') }}" required>
                @error('ubicacion')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{ old('descripcion') }}</textarea>
                @error('descripcion')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{ route('bodegas.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
@endsection