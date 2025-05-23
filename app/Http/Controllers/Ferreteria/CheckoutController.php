<?php

namespace App\Http\Controllers\Ferreteria;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\Producto; // Para actualizar el stock

class CheckoutController extends Controller
{
    /**
     * Muestra el formulario de pago.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showCheckoutForm(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('ferreteria.cart.index')->with('error', 'Tu carrito está vacío. No puedes proceder al pago.');
        }

        // Calcula el total del carrito
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $user = Auth::user(); // Obtiene el usuario autenticado

        return view('ferreteria.checkout', compact('cart', 'total', 'user'));
    }

    /**
     * Procesa el pago y crea el pedido.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function processCheckout(Request $request)
    {
        // 1. Validar los datos del formulario
        $request->validate([
            'shipping_address' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'state' => 'nullable|string|max:255',
            'zip_code' => 'nullable|string|max:20',
            'country' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'notes' => 'nullable|string|max:500',
            // No se validan los detalles de pago reales aquí, ya que es una simulación.
            // En un entorno real, integrarías un gateway de pago.
        ]);

        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('ferreteria.cart.index')->with('error', 'Tu carrito está vacío. No puedes completar el pago.');
        }

        // 2. Verificar el stock de los productos antes de crear la orden
        foreach ($cart as $productId => $item) {
            $product = Producto::find($productId);
            if (!$product || $product->cantidad_en_stock < $item['quantity']) {
                return redirect()->route('ferreteria.cart.index')->with('error', 'No hay suficiente stock para "' . $item['name'] . '". Por favor, ajusta la cantidad en tu carrito.');
            }
        }

        // 3. Calcular el total final
        $total = 0;
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        // 4. Crear el pedido en la base de datos
        $order = Order::create([
            'user_id' => Auth::id(),
            'total' => $total,
            'status' => 'pending', // O 'processing' si el pago es exitoso
            'shipping_address' => $request->shipping_address,
            'city' => $request->city,
            'state' => $request->state,
            'zip_code' => $request->zip_code,
            'country' => $request->country,
            'phone_number' => $request->phone_number,
            'notes' => $request->notes,
        ]);

        // 5. Adjuntar productos al pedido y actualizar el stock
        foreach ($cart as $productId => $item) {
            $order->productos()->attach($productId, [
                'quantity' => $item['quantity'],
                'price_at_purchase' => $item['price']
            ]);

            // Actualizar el stock del producto
            $product = Producto::find($productId);
            if ($product) {
                $product->cantidad_en_stock -= $item['quantity'];
                $product->save();
            }
        }

        // 6. Vaciar el carrito de la sesión
        session()->forget('cart');

        // 7. Redirigir a una página de confirmación
        return redirect()->route('ferreteria.order.confirmation', $order->id)->with('success', '¡Tu pedido ha sido realizado con éxito!');
    }

    /**
     * Muestra la página de confirmación del pedido.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\View\View|\Illuminate\Http\RedirectResponse
     */
    public function showOrderConfirmation(Order $order)
    {
        // Asegurarse de que el usuario autenticado sea el dueño del pedido
        if (Auth::id() !== $order->user_id) {
            return redirect()->route('ferreteria.catalogo')->with('error', 'No tienes permiso para ver este pedido.');
        }

        // Cargar los productos relacionados con el pedido
        $order->load('productos'); // Carga la relación 'productos'

        return view('ferreteria.order-confirmation', compact('order'));
    }
}
