<?php

use App\Http\Controllers\AdministracionController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioFavoritoController;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Support\Facades\Route;
use App\http\Middleware\Role;




// RUTAS PARA LA WEB
Route::prefix('web')->group(function() {
    //Productos
    Route::get('/verTodos', [ProductoController::class, 'index'])->name('verTodos');        // VER TODOS LOS PRODUCTOS QUE HAY EN EL MOMENTO QUE ESTEN ACTIVOS
    Route::get('/verCategoria/{id}', [ProductoController::class, 'indexCategoria']);        // VER LOS PROYECTO PERO POR CATEGORIA
    Route::post('/buscador', [ProductoController::class, 'buscador'])->name('buscador');    // BUSCAR UN PRODUCTO POR NOMBRE 
    Route::get('/verProducto/{id}', [ProductoController::class, 'show']);                   // VER MAS INFORMACION DE UN PRODUCTO EN ESPECÍFICO

    
    // RUTAS DE LA WEB PERO PARA LOS QUE ESTAN REGISTRADOS O LOGUEADOSS
    Route::middleware('auth')->group(function () {

        // PRODUCTO
        Route::get('/addProducto', [ProductoController::class, 'create'])->name('addProducto');     //VER FORMULARIO AÑADIR PRODUCTO
        Route::post('/producto', [ProductoController::class, 'store'])->name('storeProducto');      //AÑADIR PRODUCTO A LA VENTA

        // Favorito
        Route::get('/addFavorito/{id}', [UsuarioFavoritoController::class, 'favorito']);            //AÑADIR A FAVORITO
        Route::get('/deleteFavorito/{id}', [UsuarioFavoritoController::class, 'create']);           //ELIMINAR UN FAVORITO

        // PERFIL
        Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');           
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});

// RUTAS CREADAS PARA LOS ADMINISTRADORES QUE TE VERIFICA SI TIENES EL ROL DE ADMINISTRADOR Y SI LO TIENES PUEDES REALIZAR LAS ACCIONES DE ADMIN
Route::prefix('admin')->middleware(['auth', 'verified', 'mdrol:administrador'])->group(function () {
    //INICIO 
    Route::get('/inicio', [AdministracionController::class, 'inicio'])->name('adminInicio');            // VER INICIO DE ADMIN

    //USUARIO
    Route::get('/usuario', [AdministracionController::class, 'usuario'])->name('adminUsuario');         // VER TODOS LOS USUARIOS REGISTRADOS DESDE ADMIN
    Route::get('/eliminarUsuario', [AdministracionController::])

    //PRODUCTOS
    Route::get('/productos', [AdministracionController::class, 'productos'])->name('adminProducto');    // VER TODOS LOS PRODUCTOS DESDE ADMIN
    Route::get('/eliminarProducto/{id}', [AdministracionController::class, 'eliminarProducto']);        // ELIMINAR PRODUCTO DESDE ADMIN
    Route::get('/editarProducto/{id}', [AdministracionController::class, 'editarProducto']);            // VER FORMULARIO DE EDITAR PRODUCTO DESDE ADMIN
    Route::post('/editProducto', [AdministracionController::class, 'editProducto']);                    // EDITAR PRODUCTO DESDE ADMIN

    //CATEGORIAS
    Route::get('/categorias', [AdministracionController::class, 'categoria'])->name('adminCategoria');  // VER TODAS LAS CATEGORIAS DESDE ADMIN

    //FAVORITOS
    Route::get('/favoritos', [AdministracionController::class, 'favorito'])->name('adminFavorito');     // VER TODOS LOS FAVORITOS DESDE ADMIN

    //OPINIONES
    Route::get('/opiniones', [AdministracionController::class, 'opiniones'])->name('adminOpiniones');   // VER TODAS LAS RESEÑAS DESDE ADMIN
});

// RUTA CREADA PARA CERRAR SESIÓN
Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('milogout');

// RUTA PARA EL INICIO DE LA PAGINA
Route::get('/', function () {
    $categorias = Categoria::all();
    $producto = Producto::with('categorias')->inRandomOrder()->take(6)->get();

    return view('welcome', ['categorias' => $categorias, 'productos' => $producto]);
});

// RUTA PARA VOLVER A LA PAGINA DE INICIO 
Route::get('/welcome', function () {
    $categorias = Categoria::all();
    $producto = Producto::with('categorias')->inRandomOrder()->take(6)->get();

    return view('welcome', ['categorias' => $categorias, 'productos' => $producto]);
})->name('welcome');



require __DIR__.'/auth.php';
