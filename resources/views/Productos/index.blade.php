
@extends('layouts.app')

@section('content')
<h1>Productos</h1>
<a href="{{ route('productos.create') }}">Crear Producto</a>
<ul>
@foreach($productos as $producto)
<li>{{ $producto->nombre }} - {{ $producto->precio }}</li>
@endforeach
</ul>
@endsection
