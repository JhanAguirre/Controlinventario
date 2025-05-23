@extends('layouts.ferreteria')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-lg border-2 rounded-lg overflow-hidden" style="background-color: #F8F9FA; border-color: #CBD5E0;">
                    <div class="card-body p-5">
                        <div class="row">
                            <div class="col-md-5 text-center mb-4 mb-md-0">
                                {{-- Imagen del producto (placeholder) --}}
                                <img src="https://placehold.co/300x300/334155/F8FAFC?text=PRODUCTO" alt="Imagen de {{ $product->nombre }}" class="img-fluid rounded-lg shadow-md" style="border: 3px solid #4A5568;">
                            </div>
                            <div class="col-md-7">
                                <h1 class="text-4xl font-bold text-gray-900 mb-3">{{ $product->nombre }}</h1>
                                <p class="text-gray-700 text-lg mb-4">{{ $product->descripcion }}</p>

                                <div class="mb-4">
                                    <span class="text-2xl font-bold text-green-700">${{ number_format($product->precio, 2) }}</span>
                                </div>

                                <div class="mb-4">
                                    <p class="text-gray-700">
                                        <i class="fas fa-boxes text-blue-500 mr-2"></i> Stock Disponible:
                                        @if($product->cantidad_en_stock > 0)
                                            <span class="badge bg-success fs-6">{{ $product->cantidad_en_stock }} unidades</span>
                                        @else
                                            <span class="badge bg-danger fs-6">Agotado</span>
                                        @endif
                                    </p>
                                    @if($product->category)
                                        <p class="text-gray-600">
                                            <i class="fas fa-tag text-purple-500 mr-2"></i> Categoría: <a href="{{ route('ferreteria.productos.byCategory', $product->category->slug) }}" class="text-decoration-none text-primary">{{ $product->category->name }}</a>
                                        </p>
                                    @endif
                                    @if($product->brand)
                                        <p class="text-gray-600">
                                            <i class="fas fa-building text-orange-500 mr-2"></i> Marca: <a href="{{ route('ferreteria.productos.byBrand', $product->brand->slug) }}" class="text-decoration-none text-primary">{{ $product->brand->name }}</a>
                                        </p>
                                    @endif
                                </div>

                                {{-- Formulario para añadir al carrito con selector de cantidad --}}
                                <form action="{{ route('ferreteria.cart.add', $product->id) }}" method="POST" class="d-flex align-items-center mb-4">
                                    @csrf
                                    <label for="quantity" class="form-label me-2 mb-0">Cantidad:</label>
                                    <input type="number" name="quantity" id="quantity" value="1" min="1" max="{{ $product->cantidad_en_stock }}" class="form-control w-25 me-3">
                                    <button type="submit" class="btn btn-success px-4 py-2" @if($product->cantidad_en_stock == 0) disabled @endif>
                                        <i class="fas fa-cart-plus"></i> Añadir al Carrito
                                    </button>
                                </form>

                                <a href="{{ route('ferreteria.catalogo') }}" class="btn btn-secondary mt-3">
                                    <i class="fas fa-arrow-left mr-2"></i> Volver al Catálogo
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection