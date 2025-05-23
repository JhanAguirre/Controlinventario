<?php

namespace App\Http\Controllers\Ferreteria;

use App\Http\Controllers\Controller;
use App\Models\Bodega; // Asegúrate de que tu modelo Bodega exista
use Illuminate\Http\Request;

class BodegaController extends Controller
{
    /**
     * Muestra una lista de todas las bodegas.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $bodegas = Bodega::all(); // Obtiene todas las bodegas
        return view('ferreteria.bodegas.index', compact('bodegas'));
    }

    /**
     * Muestra los productos disponibles en una bodega específica.
     *
     * @param  \App\Models\Bodega  $bodega
     * @return \Illuminate\View\View
     */
    public function show(Bodega $bodega)
    {
        // Carga los productos relacionados con la bodega, incluyendo la cantidad en esa bodega
        $productosEnBodega = $bodega->productos()->withPivot('cantidad_en_bodega')->paginate(10); // Paginación

        return view('ferreteria.bodegas.show', compact('bodega', 'productosEnBodega'));
    }
}
