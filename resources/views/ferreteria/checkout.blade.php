@extends('layouts.ferreteria')

@section('content')
    <div class="container py-4">
        <h1 class="text-center text-4xl font-bold text-gray-800 mb-6" style="color: #2D3748;"><i class="fas fa-credit-card mr-2"></i> Finalizar Compra</h1>
        <p class="text-center text-gray-600 mb-8" style="color: #4A5568;">Por favor, completa tus datos para finalizar el pedido.</p>

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-lg border-2 rounded-lg p-4" style="background-color: #F8F9FA; border-color: #CBD5E0;">
                    <div class="card-body">
                        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Detalles del Pedido</h2>
                        <ul class="list-group mb-4">
                            @foreach($cart as $item)
                                <li class="list-group-item d-flex justify-content-between align-items-center">
                                    <div>
                                        <strong>{{ $item['name'] }}</strong>
                                        <br>
                                        <small class="text-muted">{{ $item['quantity'] }} x ${{ number_format($item['price'], 2) }}</small>
                                    </div>
                                    <span class="badge bg-primary rounded-pill">${{ number_format($item['quantity'] * $item['price'], 2) }}</span>
                                </li>
                            @endforeach
                            <li class="list-group-item d-flex justify-content-between align-items-center bg-light font-weight-bold">
                                <strong>Total del Carrito:</strong>
                                <strong>${{ number_format($total, 2) }}</strong>
                            </li>
                        </ul>

                        <h2 class="text-2xl font-semibold text-gray-800 mb-4 mt-5">Información de Envío</h2>
                        <form action="{{ route('ferreteria.checkout.process') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="shipping_address" class="form-label">Dirección de Envío:</label>
                                <input type="text" class="form-control @error('shipping_address') is-invalid @enderror" id="shipping_address" name="shipping_address" value="{{ old('shipping_address', $user->address ?? '') }}" required>
                                @error('shipping_address')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="city" class="form-label">Ciudad:</label>
                                    <input type="text" class="form-control @error('city') is-invalid @enderror" id="city" name="city" value="{{ old('city', $user->city ?? '') }}" required>
                                    @error('city')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="state" class="form-label">Estado/Provincia:</label>
                                    <input type="text" class="form-control @error('state') is-invalid @enderror" id="state" name="state" value="{{ old('state', $user->state ?? '') }}">
                                    @error('state')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="zip_code" class="form-label">Código Postal:</label>
                                    <input type="text" class="form-control @error('zip_code') is-invalid @enderror" id="zip_code" name="zip_code" value="{{ old('zip_code', $user->zip_code ?? '') }}">
                                    @error('zip_code')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="country" class="form-label">País:</label>
                                    <input type="text" class="form-control @error('country') is-invalid @enderror" id="country" name="country" value="{{ old('country', $user->country ?? '') }}" required>
                                    @error('country')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label for="phone_number" class="form-label">Número de Teléfono (Opcional):</label>
                                <input type="text" class="form-control @error('phone_number') is-invalid @enderror" id="phone_number" name="phone_number" value="{{ old('phone_number', $user->phone_number ?? '') }}">
                                @error('phone_number')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-4">
                                <label for="notes" class="form-label">Notas del Pedido (Opcional):</label>
                                <textarea class="form-control @error('notes') is-invalid @enderror" id="notes" name="notes" rows="3">{{ old('notes') }}</textarea>
                                @error('notes')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <h2 class="text-2xl font-semibold text-gray-800 mb-4 mt-5">Método de Pago</h2>
                            <div class="alert alert-info" role="alert">
                                Esta es una simulación de pago. En una aplicación real, aquí integrarías un gateway de pago (ej. Stripe, PayPal).
                            </div>
                            <div class="mb-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_method" id="payment_cash" value="cash_on_delivery" checked>
                                    <label class="form-check-label" for="payment_cash">
                                        Pago Contra Entrega
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="payment_method" id="payment_card" value="card" disabled>
                                    <label class="form-check-label text-muted" for="payment_card">
                                        Tarjeta de Crédito/Débito (No disponible en esta simulación)
                                    </label>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ route('ferreteria.cart.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-arrow-left mr-2"></i> Volver al Carrito
                                </a>
                                <button type="submit" class="btn btn-success px-4 py-2">
                                    <i class="fas fa-check-circle mr-2"></i> Confirmar Pedido (${{ number_format($total, 2) }})
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection