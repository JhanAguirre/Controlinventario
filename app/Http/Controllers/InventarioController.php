<?php

namespace App\Http\Controllers;

use App\Models\Bodega;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class InventarioController extends Controller
{
    /**
     * Muestra el inventario general de todos los productos con su stock total.
     */
    public function index()
    {
        Log::info('InventarioController: index() - Iniciando...');

        $productos = Producto::select('productos.*')
            ->leftJoin('bodega_producto', 'productos.id', '=', 'bodega_producto.producto_id')
            ->selectRaw('SUM(bodega_producto.cantidad_en_bodega) as total_cantidad_en_bodega')
            ->groupBy(
                'productos.id',
                'productos.nombre',
                'productos.descripcion',
                'productos.precio',
                'productos.cantidad_en_stock',
                'productos.created_at',
                'productos.updated_at'
            )
            ->paginate(10);

        Log::info('InventarioController: index() - Productos obtenidos.');

        return view('inventario.index', compact('productos'));
    }

    /**
     * Muestra el inventario detallado de un producto específico por bodega.
     */
    public function show(Producto $producto)
    {
        Log::info('InventarioController: show() - Iniciando para Producto ID: ' . $producto->id);

        $producto->load([
            'bodegas' => function ($query) {
                $query->select('bodegas.id', 'bodegas.nombre')
                      ->withPivot('cantidad_en_bodega');
            }
        ]);
        $bodegas = Bodega::orderBy('nombre')->get(['id', 'nombre']);

        Log::info('InventarioController: show() - Bodegas y Producto cargados.');

        return view('inventario.show', compact('producto', 'bodegas'));
    }

    /**
     * Actualiza la cantidad de un producto en una bodega específica.
     */
    public function update(Request $request, Producto $producto)
    {
        Log::info('InventarioController: update() - Iniciando para Producto ID: ' . $producto->id);
        Log::info('InventarioController: update() - Request data: ' . json_encode($request->all()));

        $request->validate([
            'bodega_id' => 'required|exists:bodegas,id',
            'cantidad_en_bodega' => 'required|integer|min:0',
        ]);

        try {
            DB::beginTransaction();

            $producto->bodegas()->syncWithoutDetaching([
                $request->bodega_id => ['cantidad_en_bodega' => $request->cantidad_en_bodega],
            ]);

            $producto->loadSum('bodegas', 'cantidad_en_bodega');
            $producto->cantidad_en_stock = $producto->bodegas_sum_cantidad_en_bodega;
            $producto->save();

            DB::commit();

            Log::info('InventarioController: update() - Inventario actualizado exitosamente.');

            return redirect()->route('inventario.show', $producto)->with('success', 'Inventario actualizado exitosamente.');

        } catch (\Exception $e) {
            DB::rollBack();

            Log::error('InventarioController: update() - Error al actualizar: ' . $e->getMessage());
            return back()->with('error', 'Error al actualizar el inventario: ' . $e->getMessage());
        }
    }

    /**
     * Muestra el formulario para asignar productos a bodegas.
     */
    public function asignar(Producto $producto)
{
    Log::info('InventarioController: asignar() - Iniciando para Producto ID: ' . $producto->id);

    $bodegas = Bodega::orderBy('nombre')->get(['id', 'nombre']);
    $producto->load([
        'bodegas' => function ($query) {
            $query->select('bodegas.id', 'bodegas.nombre')
                  ->withPivot('cantidad_en_bodega');
        }
    ]);

    Log::info('InventarioController: asignar() - Bodegas y Producto cargados.');

    return view('inventario.asignar', compact('producto', 'bodegas'));
}

    /**
     * Guarda la asignación de productos a bodegas y sus cantidades.
     */
    public function guardarAsignacion(Request $request, Producto $producto)
{
    Log::info('InventarioController: guardarAsignacion() - Iniciando para Producto ID: ' . $producto->id);
    Log::info('InventarioController: guardarAsignacion() - Request data: ' . json_encode($request->all()));

    $request->validate([
        'bodegas' => 'required|array',
        'bodegas.*.bodega_id' => 'required|exists:bodegas,id',
        'bodegas.*.cantidad' => 'required|integer|min:0',
    ]);

    try {
        DB::beginTransaction();

        $syncData = [];
        foreach ($request->bodegas as $bodegaData) {
            $syncData[$bodegaData['bodega_id']] = ['cantidad_en_bodega' => $bodegaData['cantidad']];
        }

        Log::info('InventarioController: guardarAsignacion() - Sync data: ' . json_encode($syncData));

        $producto->bodegas()->sync($syncData);

        $producto->loadSum('bodegas', 'cantidad_en_bodega');
        $producto->cantidad_en_stock = $producto->bodegas_sum_cantidad_en_bodega;
        $producto->save();

        DB::commit();

        Log::info('InventarioController: guardarAsignacion() - Asignación guardada exitosamente.');

        return redirect()->route('inventario.index')->with('success', 'Inventario asignado a bodegas exitosamente.');

    } catch (\Exception $e) {
        DB::rollBack();
        Log::error('InventarioController: guardarAsignacion() - Error al guardar asignación: ' . $e->getMessage());
        return back()->with('error', 'Error al guardar la asignación: ' . $e->getMessage());
    }
}
}