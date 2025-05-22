<?php

namespace App\Http\Controllers;

use App\Models\Producto; // Asegúrate de importar tu modelo Producto
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Para verificar si el usuario está logueado
use Illuminate\Support\Facades\DB; // Importa la fachada de la base de datos

class CatalogoController extends Controller
{
    /**
     * Muestra el catálogo de productos de la ferretería.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Asegúrate de que solo los usuarios autenticados de ferretería puedan acceder a esta página
        // Si el guard por defecto es 'web' y lo usas para ambos tipos de usuarios, esto es suficiente.
        // Si tienes un guard específico para ferretería, deberías usar: Auth::guard('ferreteria_guard')->check()
        if (!Auth::check()) {
            return redirect()->route('ferreteria.login')->with('error', 'Por favor, inicia sesión para ver el catálogo.');
        }

        // Obtener todos los productos y cargar la suma de stock de las bodegas
        // Usamos leftJoin y selectRaw para sumar la cantidad_en_bodega de la tabla pivote
        $productos = Producto::select(
                'productos.id',
                'productos.nombre',
                'productos.descripcion',
                'productos.precio',
                'productos.cantidad_en_stock', // Asumiendo que esta es una columna en la tabla 'productos'
                'productos.created_at',
                'productos.updated_at',
                DB::raw('SUM(bodega_producto.cantidad_en_bodega) as total_stock_en_bodega')
            )
            ->leftJoin('bodega_producto', 'productos.id', '=', 'bodega_producto.producto_id')
            ->groupBy(
                'productos.id',
                'productos.nombre',
                'productos.descripcion',
                'productos.precio',
                'productos.cantidad_en_stock',
                'productos.created_at',
                'productos.updated_at'
            )
            ->orderBy('nombre')
            ->paginate(12);

        return view('ferreteria.catalogo', compact('productos'));
    }

    /**
     * Muestra la página de ayuda con enlaces a las páginas informativas.
     *
     * @return \Illuminate\View\View
     */
    public function showAyudaPage()
    {
        // Puedes añadir lógica aquí si necesitas pasar datos adicionales a la vista de ayuda
        return view('ferreteria.ayuda');
    }
}