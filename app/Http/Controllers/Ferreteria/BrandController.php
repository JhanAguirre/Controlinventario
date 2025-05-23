<?php

namespace App\Http\Controllers\Ferreteria;

use App\Http\Controllers\Controller;
use App\Models\Brand; // Asegúrate de que este modelo exista
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Muestra una lista de todas las marcas.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $brands = Brand::all();
        return view('ferreteria.marcas', compact('brands'));
    }
}
