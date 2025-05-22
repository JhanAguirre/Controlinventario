<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Bodega;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ReporteInventarioController extends Controller
{
    /**
     * Muestra el formulario para generar un nuevo reporte de inventario.
     */
    public function crear()
    {
        Log::info('ReporteInventarioController: crear() - Iniciando...');
        $productos = Producto::orderBy('nombre')->get();
        $bodegas = Bodega::orderBy('nombre')->get();
        return view('reportes.crear', compact('productos', 'bodegas'));
    }

    /**
     * Genera el reporte de inventario basado en los filtros proporcionados.
     */
    public function generar(Request $request)
    {
        Log::info('ReporteInventarioController: generar() - Iniciando...');
        Log::info('ReporteInventarioController: generar() - Filtros: ' . json_encode($request->all()));

        $request->validate([
            'tipo_reporte' => 'required|in:general,por_bodega,productos_sin_stock',
            'bodega_id' => 'nullable|exists:bodegas,id',
            'producto_id' => 'nullable|exists:productos,id',
        ]);

        $tipoReporte = $request->input('tipo_reporte');
        $bodegaId = $request->input('bodega_id');
        $productoId = $request->input('producto_id');

        $reporteData = [];

        switch ($tipoReporte) {
            case 'general':
                $reporteData = $this->generarReporteGeneral();
                $vista = 'reportes.general';
                break;
            case 'por_bodega':
                if ($bodegaId) {
                    $reporteData = $this->generarReportePorBodega($bodegaId);
                    $vista = 'reportes.por_bodega';
                } else {
                    return back()->with('error', 'Debes seleccionar una bodega para este tipo de reporte.');
                }
                break;
            case 'productos_sin_stock':
                $reporteData = $this->generarReporteProductosSinStock();
                $vista = 'reportes.sin_stock';
                break;
            default:
                return back()->with('error', 'Tipo de reporte inválido.');
        }

        Log::info('ReporteInventarioController: generar() - Reporte generado.');

        return view($vista, compact('reporteData', 'tipoReporte'));
    }

    /**
     * Genera el reporte general del inventario.
     */
    protected function generarReporteGeneral()
{
    $productos = Producto::all();

    foreach ($productos as $producto) {
        $producto->total_stock = $producto->bodegas()->sum('cantidad_en_bodega');
    }

    return $productos;
}

    /**
     * Genera el reporte del inventario para una bodega específica.
     *
     * @param int $bodegaId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    protected function generarReportePorBodega(int $bodegaId)
    {
        $bodega = Bodega::findOrFail($bodegaId);
        return $bodega->productos()->withPivot('cantidad_en_bodega')->get();
    }

    /**
     * Genera el reporte de productos que no tienen stock en ninguna bodega.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    protected function generarReporteProductosSinStock()
    {
        return Producto::whereDoesntHave('bodegas')->get();
    }

    // Puedes agregar más métodos para otros tipos de reportes (por producto, etc.)
}