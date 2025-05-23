<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Bodega;
use App\Models\BodegaProducto; // ¡ASEGÚRATE DE QUE ESTA LÍNEA ESTÉ PRESENTE!
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InventarioController extends Controller
{
    /**
     * Muestra el inventario consolidado de productos en todas las bodegas.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        // Obtener todos los productos y sumar sus cantidades en las bodegas
        $productos = Producto::leftJoin('bodega_producto', 'productos.id', '=', 'bodega_producto.producto_id')
            ->select(
                'productos.id',
                'productos.nombre',
                'productos.descripcion',
                'productos.precio',
                'productos.cantidad_en_stock', // Cantidad inicial o stock base
                'productos.created_at',
                'productos.updated_at',
                'productos.category_id', // Añadido al SELECT
                'productos.brand_id',    // Añadido al SELECT
                DB::raw('SUM(bodega_producto.cantidad_en_bodega) as total_cantidad_en_bodega')
            )
            ->groupBy(
                'productos.id',
                'productos.nombre',
                'productos.descripcion',
                'productos.precio',
                'productos.cantidad_en_stock',
                'productos.created_at',
                'productos.updated_at',
                'productos.category_id', // Añadido al GROUP BY
                'productos.brand_id'     // Añadido al GROUP BY
            )
            ->orderBy('productos.nombre')
            ->paginate(10); // Paginación para el inventario

        return view('inventario.index', compact('productos'));
    }

    /**
     * Muestra los detalles de inventario de un producto específico en cada bodega.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\View\View
     */
    public function show(Producto $producto)
    {
        $bodegasConStock = $producto->bodegas()->withPivot('cantidad_en_bodega')->get();
        return view('inventario.show', compact('producto', 'bodegasConStock'));
    }

    /**
     * Muestra el formulario para asignar o ajustar el stock de un producto en una bodega.
     *
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\View\View
     */
    public function asignar(Producto $producto)
    {
        $bodegas = Bodega::all();
        // Aquí es donde se usa BodegaProducto
        $bodegaProducto = BodegaProducto::where('producto_id', $producto->id)->get()->keyBy('bodega_id');
        return view('inventario.asignar', compact('producto', 'bodegas', 'bodegaProducto'));
    }

    /**
     * Guarda la asignación o ajuste del stock de un producto en una bodega.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Producto  $producto
     * @return \Illuminate\Http\RedirectResponse
     */
    public function guardarAsignacion(Request $request, Producto $producto)
    {
        $request->validate([
            'bodegas' => 'required|array',
            'bodegas.*.cantidad' => 'nullable|integer|min:0',
        ]);

        foreach ($request->input('bodegas') as $bodegaId => $data) {
            $cantidad = $data['cantidad'] ?? 0;

            if ($cantidad > 0) {
                // Aquí también se usa BodegaProducto
                BodegaProducto::updateOrCreate(
                    ['producto_id' => $producto->id, 'bodega_id' => $bodegaId],
                    ['cantidad_en_bodega' => $cantidad]
                );
            } else {
                // Y aquí
                BodegaProducto::where('producto_id', $producto->id)
                              ->where('bodega_id', $bodegaId)
                              ->delete();
            }
        }

        return redirect()->route('inventario.index')->with('success', 'Stock de ' . $producto->nombre . ' actualizado correctamente.');
    }
}