<?php

namespace App\Http\Controllers\Ferreteria;

use App\Http\Controllers\Controller;
use App\Models\Producto; // Asumiendo que tu modelo de productos se llama Producto
use App\Models\Category; // Asumiendo que tienes un modelo Category
use App\Models\Brand;    // Asumiendo que tienes un modelo Brand
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Muestra el catálogo de productos.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $query = Producto::query();

        // Implementar búsqueda de productos
        if ($request->has('search') && !empty($request->search)) {
            $search = $request->search;
            $query->where('nombre', 'like', '%' . $search . '%')
                  ->orWhere('descripcion', 'like', '%' . $search . '%');
        }

        $products = $query->paginate(12); // Paginación de 12 productos por página
        $categories = Category::all(); // Carga todas las categorías
        $brands = Brand::all();       // Carga todas las marcas

        return view('ferreteria.catalogo', compact('products', 'categories', 'brands'));
    }

    /**
     * Muestra los detalles de un producto específico.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $product = Producto::findOrFail($id);
        return view('ferreteria.detalle-producto', compact('product'));
    }

    /**
     * Muestra productos filtrados por categoría.
     *
     * @param  string  $slug
     * @return \Illuminate\View\View
     */
    public function byCategory($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $products = $category->productos()->paginate(12); // Asume una relación 'productos' en tu modelo Category
        $categories = Category::all();
        $brands = Brand::all();

        return view('ferreteria.catalogo', compact('products', 'category', 'categories', 'brands'));
    }

    /**
     * Muestra productos filtrados por marca.
     *
     * @param  string  $slug
     * @return \Illuminate\View\View
     */
    public function byBrand($slug)
    {
        $brand = Brand::where('slug', $slug)->firstOrFail();
        $products = $brand->productos()->paginate(12); // Asume una relación 'productos' en tu modelo Brand
        $categories = Category::all();
        $brands = Brand::all();

        return view('ferreteria.catalogo', compact('products', 'brand', 'categories', 'brands'));
    }
}