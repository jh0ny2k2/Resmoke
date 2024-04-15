<?php

use App\Http\Controllers\AdministracionController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $categorias = Categoria::all();
    $producto = Producto::with('categorias')->inRandomOrder()->take(6)->get();

    return view('welcome', ['categorias' => $categorias, 'productos' => $producto]);
});

Route::get('/welcome', function () {
    $categorias = Categoria::all();
    $producto = Producto::with('categorias')->inRandomOrder()->take(6)->get();

    return view('welcome', ['categorias' => $categorias, 'productos' => $producto]);
})->name('welcome');

// RUTA CREADA PARA CERRAR SESIÓN
Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('milogout');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('web')->group(function() {
    //Productos
    Route::get('/verTodos', [ProductoController::class, 'index'])->name('verTodos');
    Route::get('/verCategoria/{id}', [ProductoController::class, 'indexCategoria']);
    Route::post('/buscador', [ProductoController::class, 'buscador'])->name('buscador');
    Route::get('/verProducto/{id}', [ProductoController::class, 'show']);

    // Perfil
    Route::middleware('auth')->group(function () {
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});



Route::prefix('admin')->middleware(['auth', 'verified', 'rol:administrador'])->group(function () { 
    Route::get('/inicio', [AdministracionController::class, 'inicio'])->name('adminInicio');
});


require __DIR__.'/auth.php';
