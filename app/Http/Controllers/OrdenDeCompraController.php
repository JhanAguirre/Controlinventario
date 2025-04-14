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
        $ordenes = OrdenDeCompra::all();
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
        $request->validate([
            'producto_id' => 'required',
            'proveedor_id' => 'required',
            'cantidad' => 'required|integer',
            'fecha_orden' => 'required|date',
            'fecha_entrega_estimada' => 'required|date',
        ]);

        OrdenDeCompra::create($request->all());
        return redirect()->route('ordenes.index');
    }

    public function show(OrdenDeCompra $orden)
    {
        return view('ordencompra.show', compact('orden'));
    }

    public function edit(OrdenDeCompra $orden)
    {
        $productos = Producto::all();
        $proveedores = Proveedor::all();
        return view('ordencompra.edit', compact('orden', 'productos', 'proveedores'));
    }

    public function update(Request $request, OrdenDeCompra $orden)
    {
        $request->validate([
            'producto_id' => 'required',
            'proveedor_id' => 'required',
            'cantidad' => 'required|integer',
            'fecha_orden' => 'required|date',
            'fecha_entrega_estimada' => 'required|date',
        ]);

        $orden->update($request->all());
        return redirect()->route('ordenes.index');
    }

    public function destroy(OrdenDeCompra $orden)
    {
        $orden->delete();
        return redirect()->route('ordenes.index');
    }
}
