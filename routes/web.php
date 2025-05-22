<?php

use App\Http\Controllers\ReporteInventarioController;
use App\Http\Controllers\BodegaController;
use App\Http\Controllers\OrdenDeCompraController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\UserAuthController;
use App\Http\Controllers\CatalogoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('proveedores', ProveedorController::class);
    Route::resource('ordenes', OrdenDeCompraController::class)->middleware('auth');
    Route::resource('productos', ProductoController::class);
    Route::resource('bodegas', BodegaController::class);
    Route::get('/reportes/crear', [ReporteInventarioController::class, 'crear'])->name('reportes.crear');
    Route::post('/reportes/generar', [ReporteInventarioController::class, 'generar'])->name('reportes.generar');
    // Rutas para el Inventario
    Route::get('/inventario', [InventarioController::class, 'index'])->name('inventario.index');
    Route::get('/inventario/{producto}', [InventarioController::class, 'show'])->name('inventario.show');
    Route::put('/inventario/{producto}', [InventarioController::class, 'update'])->name('inventario.update'); // Corregido: Route::put
    Route::get('/inventario/{producto}/asignar', [InventarioController::class, 'asignar'])->name('inventario.asignar');
    Route::post('/inventario/{producto}/asignar', [InventarioController::class, 'guardarAsignacion'])->name('inventario.guardarAsignacion');
});

require __DIR__ . '/auth.php';

// Rutas para las páginas informativas (versión ADMIN/Dashboard) - SIN CAMBIOS AQUÍ
Route::get('/quienes-somos', function () {
    return view('quienes-somos');
})->name('quienes-somos');

Route::get('/contactenos', function () {
    return view('contactenos');
})->name('contactenos');

Route::get('/politicas-seguridad', function () {
    return view('politicas-seguridad');
})->name('politicas-seguridad');

Route::get('/terminos-condiciones', function () {
    return view('terminos-condiciones');
})->name('terminos-condiciones');

// Rutas para el login de usuario de la ferretería y catálogo
Route::prefix('ferreteria')->group(function () {
    Route::get('/login', [UserAuthController::class, 'showLoginForm'])->name('ferreteria.login');
    Route::post('/login', [UserAuthController::class, 'login'])->name('ferreteria.login.post');
    Route::post('/logout', [UserAuthController::class, 'logout'])->name('ferreteria.logout');
    Route::get('/catalogo', [CatalogoController::class, 'index'])->name('ferreteria.catalogo');
    Route::get('/ayuda', [CatalogoController::class, 'showAyudaPage'])->name('ferreteria.ayuda');

    // Nuevas rutas para las páginas informativas (versión USUARIO)
    Route::get('/quienes-somos-user', function () {
        return view('ferreteria.quienes-somos');
    })->name('ferreteria.quienes-somos');

    Route::get('/contactenos-user', function () {
        return view('ferreteria.contactenos');
    })->name('ferreteria.contactenos');

    Route::get('/politicas-seguridad-user', function () {
        return view('ferreteria.politicas-seguridad');
    })->name('ferreteria.politicas-seguridad');

    Route::get('/terminos-condiciones-user', function () {
        return view('ferreteria.terminos-condiciones');
    })->name('ferreteria.terminos-condiciones');
});