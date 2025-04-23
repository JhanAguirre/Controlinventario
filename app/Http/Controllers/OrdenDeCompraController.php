<?php

namespace App\Http\Controllers;

use App\Models\OrdenDeCompra;
use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class OrdenDeCompraController extends Controller
{
    public function index()
    {
        $ordenes = OrdenDeCompra::with(['producto', 'proveedor'])->latest()->paginate(10);
        return view('ordencompra.index', compact('ordenes'));
    }

    public function create()
    {
        $productos = Producto::all();
        $proveedores = Proveedor::all();
        return view('ordencompra.create', compact('productos', 'proveedores'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'producto_id' => 'required|exists:productos,id',
            'proveedor_id' => 'required|exists:proveedores,id',
            'cantidad' => 'required|integer|min:1',
            'fecha_orden' => 'required|date',
            'fecha_entrega_estimada' => 'required|date|after_or_equal:fecha_orden'
        ]);
    
       
        $validated['fecha_orden'] = \Carbon\Carbon::parse($validated['fecha_orden'])->format('Y-m-d');
        $validated['fecha_entrega_estimada'] = \Carbon\Carbon::parse($validated['fecha_entrega_estimada'])->format('Y-m-d');
    
        OrdenDeCompra::create($validated);
    
        return redirect()->route('ordenes.index')
                        ->with('success', 'Orden de compra creada exitosamente.');
    }

    public function edit(OrdenDeCompra $ordene)
{
    $productos = Producto::all();
    $proveedores = Proveedor::all();
    

    $ordene->fecha_orden = \Carbon\Carbon::parse($ordene->fecha_orden)->format('Y-m-d');
    $ordene->fecha_entrega_estimada = \Carbon\Carbon::parse($ordene->fecha_entrega_estimada)->format('Y-m-d');
    
    return view('ordencompra.edit', compact('ordene', 'productos', 'proveedores'));
}

public function update(Request $request, OrdenDeCompra $ordene)
{
    $validated = $request->validate([
        'producto_id' => 'required|exists:productos,id',
        'proveedor_id' => 'required|exists:proveedores,id',
        'cantidad' => 'required|integer|min:1',
        'fecha_orden' => 'required|date',
        'fecha_entrega_estimada' => 'required|date|after_or_equal:fecha_orden'
    ]);

    
    $validated['fecha_orden'] = \Carbon\Carbon::parse($validated['fecha_orden'])->format('Y-m-d');
    $validated['fecha_entrega_estimada'] = \Carbon\Carbon::parse($validated['fecha_entrega_estimada'])->format('Y-m-d');

    $ordene->update($validated);

    return redirect()->route('ordenes.index')
                    ->with('success', 'Orden de compra actualizada exitosamente.');
}

    public function destroy(OrdenDeCompra $ordene)
    {
        $ordene->delete();

        return redirect()->route('ordenes.index')
                         ->with('success', 'Orden de compra eliminada exitosamente.');
    }
}