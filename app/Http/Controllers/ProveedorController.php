<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    // Mostrar la lista de proveedores
    public function index()
    {
        $proveedores = Proveedor::all();
        return view('proveedores.index', compact('proveedores'));
    }

    // Mostrar el formulario para crear un nuevo proveedor
    public function create()
    {
        return view('proveedores.create');
    }

    // Almacenar un nuevo proveedor en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'dirección' => 'required',
            'teléfono' => 'required',
            'email' => 'required|email',
        ]);

        Proveedor::create($request->all());
        return redirect()->route('proveedores.index');
    }

    // Mostrar un proveedor específico
    public function show(Proveedor $proveedor)
    {
        return view('proveedores.show', compact('proveedor'));
    }

    // Mostrar el formulario para editar un proveedor existente
    public function edit(Proveedor $proveedor)
    {
        return view('proveedores.edit', compact('proveedor'));
    }

    // Actualizar un proveedor existente en la base de datos
    public function update(Request $request, Proveedor $proveedor)
    {
        $request->validate([
            'nombre' => 'required',
            'dirección' => 'required',
            'teléfono' => 'required',
            'email' => 'required|email',
        ]);

        $proveedor->update($request->all());
        return redirect()->route('proveedores.index');
    }

    // Eliminar un proveedor de la base de datos
    public function destroy(Proveedor $proveedor)
    {
        $proveedor->delete();
        return redirect()->route('proveedores.index');
    }
}

