@extends('layouts.ferreteria')

@section('content')
    <div class="container py-4">
        <h1 class="text-center text-4xl font-bold text-gray-800 mb-6" style="color: #2D3748;"><i class="fas fa-receipt mr-2"></i> Mis Pedidos</h1>
        <p class="text-center text-gray-600 mb-8" style="color: #4A5568;">Consulta el historial de tus compras.</p>

        <div class="row justify-content-center">
            <div class="col-md-10">
                @if($orders->isEmpty())
                    <div class="alert alert-info text-center" role="alert">
                        Aún no tienes pedidos realizados. ¡Explora nuestro catálogo!
                    </div>
                    <div class="text-center mt-4">
                        <a href="{{ route('ferreteria.catalogo') }}" class="btn btn-primary">
                            <i class="fas fa-store mr-2"></i> Ir al Catálogo
                        </a>
                    </div>
                @else
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th scope="col">ID Pedido</th>
                                    <th scope="col">Fecha</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>#{{ $order->id }}</td>
                                        <td>{{ $order->created_at->format('d/m/Y H:i') }}</td>
                                        <td>${{ number_format($order->total, 2) }}</td>
                                        <td><span class="badge bg-primary">{{ $order->status }}</span></td>
                                        <td>
                                            <a href="#" class="btn btn-sm btn-info" title="Ver Detalles del Pedido">
                                                <i class="fas fa-info-circle"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @endif
                <div class="text-center mt-4">
                    <a href="{{ route('ferreteria.profile.show') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left mr-2"></i> Volver a Mi Perfil
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
