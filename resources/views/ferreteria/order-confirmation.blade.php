@extends('layouts.ferreteria')

@section('content')
    <div class="container py-4">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow-lg border-2 rounded-lg p-4 text-center" style="background-color: #F8F9FA; border-color: #CBD5E0;">
                    <div class="card-body">
                        <i class="fas fa-check-circle fa-5x text-success mb-4"></i>
                        <h1 class="text-4xl font-bold text-gray-800 mb-3">¡Pedido Realizado con Éxito!</h1>
                        <p class="lead text-gray-700 mb-4">Gracias por tu compra. Tu pedido ha sido procesado.</p>

                        <div class="mb-5 text-left mx-auto" style="max-width: 600px;">
                            <h2 class="text-2xl font-semibold text-gray-800 mb-3">Detalles del Pedido #{{ $order->id }}</h2>
                            <p><strong>Fecha del Pedido:</strong> {{ $order->created_at->format('d/m/Y H:i') }}</p>
                            <p><strong>Estado:</strong> <span class="badge bg-info fs-6">{{ ucfirst($order->status) }}</span></p>
                            <p><strong>Total del Pedido:</strong> <span class="text-success fs-5">${{ number_format($order->total, 2) }}</span></p>
                            <p><strong>Dirección de Envío:</strong> {{ $order->shipping_address }}, {{ $order->city }}, {{ $order->state ? $order->state . ', ' : '' }}{{ $order->zip_code ? $order->zip_code . ', ' : '' }}{{ $order->country }}</p>
                            @if($order->phone_number)
                                <p><strong>Teléfono de Contacto:</strong> {{ $order->phone_number }}</p>
                            @endif
                            @if($order->notes)
                                <p><strong>Notas:</strong> {{ $order->notes }}</p>
                            @endif

                            <h3 class="text-xl font-semibold text-gray-800 mt-4 mb-3">Productos Incluidos:</h3>
                            <ul class="list-group">
                                @foreach($order->productos as $product)
                                    <li class="list-group-item d-flex justify-content-between align-items-center">
                                        {{ $product->pivot->quantity }} x {{ $product->nombre }}
                                        <span class="badge bg-secondary">${{ number_format($product->pivot->price_at_purchase, 2) }}</span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>

                        <div class="mt-5">
                            <a href="{{ route('ferreteria.catalogo') }}" class="btn btn-primary px-4 py-2 me-3">
                                <i class="fas fa-store mr-2"></i> Volver al Catálogo
                            </a>
                            <a href="{{ route('ferreteria.profile.orders') }}" class="btn btn-info px-4 py-2">
                                <i class="fas fa-receipt mr-2"></i> Ver Mis Pedidos
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
