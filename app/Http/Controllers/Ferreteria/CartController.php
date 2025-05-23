<?php

namespace App\Http\Controllers\Ferreteria;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Muestra el contenido del carrito de compras.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $cart = session()->get('cart', []);
        return view('ferreteria.cart', compact('cart'));
    }

    /**
     * Agrega un producto al carrito de compras.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function add(Request $request, Producto $product)
    {
        $quantity = $request->input('quantity', 1);
        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $quantity;
        } else {
            $cart[$product->id] = [
                "id" => $product->id,
                "name" => $product->nombre,
                "quantity" => $quantity,
                "price" => $product->precio, // Asegúrate de que este campo exista en tu modelo Producto
                // "image" => $product->imagen, // Si tienes una columna de imagen en tu tabla de productos
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Producto añadido al carrito.');
    }

    /**
     * Actualiza la cantidad de un producto en el carrito.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Producto $product)
    {
        $quantity = $request->input('quantity');
        $cart = session()->get('cart');

        if ($quantity <= 0) {
            unset($cart[$product->id]);
        } elseif (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] = $quantity;
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Cantidad del producto actualizada.');
    }

    /**
     * Elimina un producto del carrito.
     *
     * @param  \App\Models\Producto  $product
     * @return \Illuminate\Http\RedirectResponse
     */
    public function remove(Producto $product)
    {
        $cart = session()->get('cart');

        if (isset($cart[$product->id])) {
            unset($cart[$product->id]);
            session()->put('cart', $cart);
        }

        return redirect()->back()->with('success', 'Producto eliminado del carrito.');
    }

    /**
     * Vacía completamente el carrito.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function clear()
    {
        session()->forget('cart');
        return redirect()->back()->with('success', 'El carrito ha sido vaciado.');
    }

    /**
     * Obtiene el conteo de ítems en el carrito (para el badge).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getCartCount()
    {
        $cart = session()->get('cart', []);
        // Suma las cantidades de todos los productos en el carrito
        $count = array_sum(array_column($cart, 'quantity'));
        return response()->json(['count' => $count]);
    }
}