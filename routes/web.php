<?php

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
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::prefix('web')->group(function() {
    Route::get('/verTodos', [ProductoController::class, 'index'])->name('verTodos');
    Route::get('/verCategoria/{id}', [ProductoController::class, 'indexCategoria']);
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
