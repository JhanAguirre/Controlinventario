<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $proveedores = Proveedor::all();
    return view('proveedores.index', compact('proveedores'));
}

public function create()
{
    return view('proveedores.create');
}

public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required',
        'direccion' => 'required',
        'telefono' => 'required',
        'email' => 'required|email',
    ]);

    Proveedor::create($request->all());
    return redirect()->route('proveedores.index');
}

public function show(Proveedor $proveedor)
{
    return view('proveedores.show', compact('proveedor'));
}

public function edit(Proveedor $proveedor)
{
    return view('proveedores.edit', compact('proveedor'));
}

public function update(Request $request, Proveedor $proveedor)
{
    $request->validate([
        'nombre' => 'required',
        'direccion' => 'required',
        'telefono' => 'required',
        'email' => 'required|email',
    ]);

    $proveedor->update($request->all());
    return redirect()->route('proveedores.index');
}

public function destroy(Proveedor $proveedor)
{
    $proveedor->delete();
    return redirect()->route('proveedores.index');
}

}
