<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedores = Proveedor::orderBy('id', 'desc')->paginate(10);
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
        return redirect()->route('proveedores.index')
                        ->with('success', 'Proveedor creado exitosamente.');
    }

    public function show($id)
{
    $proveedor = Proveedor::findOrFail($id);
    return view('proveedores.show', compact('proveedor'));
}
    // Método edit modificado para mantener compatibilidad
    public function edit($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        return view('proveedores.edit', compact('proveedor'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required',
            'direccion' => 'required',
            'telefono' => 'required',
            'email' => 'required|email',
        ]);

        $proveedor = Proveedor::findOrFail($id);
        $proveedor->update($request->all());
        
        return redirect()->route('proveedores.index')
                        ->with('success', 'Proveedor actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->delete();
        
        return redirect()->route('proveedores.index')
                        ->with('success', 'Proveedor eliminado exitosamente.');
    }
}