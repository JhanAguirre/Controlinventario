<?php

namespace App\Http\Controllers;

use App\Models\Bodega;
use Illuminate\Http\Request;

class BodegaController extends Controller
{
    /**
     * Constructor con middleware de autenticación (Eliminado en este caso)
     * Es mejor aplicar el middleware a las rutas
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bodegas = Bodega::orderBy('nombre')->paginate(10);
        return view('bodegas.index', compact('bodegas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bodegas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            // 'capacidad' => 'nullable|integer|min:0',  //  Eliminado o Comentado
            // 'responsable' => 'nullable|string|max:255', //  Eliminado o Comentado
            // 'telefono_contacto' => 'nullable|string|max:20', //  Eliminado o Comentado
            // 'estado' => 'required|in:activa,inactiva,en_mantenimiento' //  Eliminado o Comentado
        ]);

        Bodega::create([
            'nombre' => $request->nombre,
            'ubicacion' => $request->ubicacion,
            'descripcion' => $request->descripcion,
            // 'capacidad' => $request->capacidad,  //  Eliminado o Comentado
            // 'responsable' => $request->responsable, //  Eliminado o Comentado
            // 'telefono_contacto' => $request->telefono_contacto, //  Eliminado o Comentado
            // 'estado' => $request->estado, //  Eliminado o Comentado
        ]);

        return redirect()->route('bodegas.index')
                         ->with('success', 'Bodega creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bodega $bodega)
    {
        return view('bodegas.show', compact('bodega'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bodega $bodega)
    {
        return view('bodegas.edit', compact('bodega'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bodega $bodega)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'ubicacion' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            // 'capacidad' => 'nullable|integer|min:0',
            // 'responsable' => 'nullable|string|max:255',
            // 'telefono_contacto' => 'nullable|string|max:20',
            // 'estado' => 'required|in:activa,inactiva,en_mantenimiento'
        ]);

        $bodega->update([
            'nombre' => $request->nombre,
            'ubicacion' => $request->ubicacion,
            'descripcion' => $request->descripcion,
            // 'capacidad' => $request->capacidad,
            // 'responsable' => $request->responsable,
            // 'telefono_contacto' => $request->telefono_contacto,
            // 'estado' => $request->estado,
        ]);

        return redirect()->route('bodegas.index')
                         ->with('success', 'Bodega actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bodega $bodega)
    {
        $bodega->delete();

        return redirect()->route('bodegas.index')
                         ->with('success', 'Bodega eliminada exitosamente.');
    }
}