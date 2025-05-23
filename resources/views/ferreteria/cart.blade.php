@extends('layouts.ferreteria')

@section('content')
    <div class="container py-4">
        <h1 class="text-center text-4xl font-bold text-gray-800 mb-6" style="color: #2D3748;"><i class="fas fa-shopping-cart mr-2"></i> Tu Carrito de Compras</h1>
        <p class="text-center text-gray-600 mb-8" style="color: #4A5568;">Revisa los productos que has añadido.</p>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        @if(empty($cart))
            <div class="alert alert-info text-center" role="alert">
                Tu carrito de compras está vacío. ¡Empieza a añadir productos!
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
                            <th scope="col">Producto</th>
                            <th scope="col">Precio</th>
                            <th scope="col">Cantidad</th>
                            <th scope="col">Subtotal</th>
                            <th scope="col">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $total = 0; @endphp
                        @foreach($cart as $id => $details)
                            @php $total += $details['price'] * $details['quantity']; @endphp
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <img src="https://placehold.co/50x50/334155/F8FAFC?text=P" alt="{{ $details['name'] }}" class="img-fluid rounded me-3">
                                        <span>{{ $details['name'] }}</span>
                                    </div>
                                </td>
                                <td>${{ number_format($details['price'], 2) }}</td>
                                <td>
                                    <form action="{{ route('ferreteria.cart.update', $id) }}" method="POST" class="d-flex">
                                        @csrf
                                        @method('PUT')
                                        <input type="number" name="quantity" value="{{ $details['quantity'] }}" min="1" class="form-control form-control-sm w-50 me-2">
                                        <button type="submit" class="btn btn-sm btn-info" title="Actualizar Cantidad"><i class="fas fa-sync-alt"></i></button>
                                    </form>
                                </td>
                                <td>${{ number_format($details['price'] * $details['quantity'], 2) }}</td>
                                <td>
                                    <form action="{{ route('ferreteria.cart.remove', $id) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Eliminar Producto"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3" class="text-end"><strong>Total:</strong></td>
                            <td colspan="2"><strong>${{ number_format($total, 2) }}</strong></td>
                        </tr>
                    </tfoot>
                </table>
            </div>

            <div class="d-flex justify-content-between mt-4">
                <a href="{{ route('ferreteria.catalogo') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left mr-2"></i> Continuar Comprando
                </a>
                <div>
                    <form action="{{ route('ferreteria.cart.clear') }}" method="POST" class="d-inline-block me-2">
                        @csrf
                        <button type="submit" class="btn btn-warning">
                            <i class="fas fa-trash-alt mr-2"></i> Vaciar Carrito
                        </button>
                    </form>
                    <a href="#" class="btn btn-success">
                        <i class="fas fa-money-check-alt mr-2"></i> Proceder al Pago
                    </a>
                </div>
            </div>
        @endif
    </div>
    <script>
        // Script para actualizar el contador del carrito en tiempo real
        document.addEventListener('DOMContentLoaded', function() {
            function updateCartCount() {
                fetch('{{ route('ferreteria.cart.count') }}') // Asegúrate de que esta ruta exista y devuelva { count: X }
                    .then(response => response.json())
                    .then(data => {
                        const cartCountElement = document.getElementById('cart-count');
                        if (cartCountElement) {
                            cartCountElement.innerText = data.count;
                        }
                    })
                    .catch(error => console.error('Error al obtener el conteo del carrito:', error));
            }

            // Llama a la función al cargar la página y cada vez que se actualice el carrito
            updateCartCount();

            // Puedes añadir listeners para los formularios de añadir/actualizar/eliminar
            // para llamar a updateCartCount() después de una operación exitosa.
            // Por ejemplo, usando un evento personalizado o interceptando la respuesta de la form.
            document.querySelectorAll('form').forEach(form => {
                form.addEventListener('submit', function(event) {
                    // Si la acción es de carrito, actualiza el contador después de un pequeño retraso
                    if (this.action.includes('/cart')) {
                        setTimeout(updateCartCount, 500); // Pequeño retraso para que la sesión se actualice
                    }
                });
            });
        });
    </script>
@endsection