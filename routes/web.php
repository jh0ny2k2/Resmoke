<?php

use App\Http\Controllers\AdminCategoría;
use App\Http\Controllers\AdminFavoritos;
use App\Http\Controllers\AdministracionController;
use App\Http\Controllers\AdminOpiniones;
use App\Http\Controllers\AdminProducto;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioFavoritoController;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Support\Facades\Route;


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
        Route::post('/addproducto', [ProductoController::class, 'store'])->name('storeProducto');      //AÑADIR PRODUCTO A LA VENTA

        // Favorito
        Route::get('/addFavorito/{id}', [UsuarioFavoritoController::class, 'favorito']);            //AÑADIR A FAVORITO
        Route::get('/deleteFavorito/{id}', [UsuarioFavoritoController::class, 'create']);           //ELIMINAR UN FAVORITO

        Route::get('/productoVenta/{id}', [ProductoController::class, 'verMisProductos']);
        Route::get('/verFavoritos/{id}', [UsuarioFavoritoController::class, 'verMisFavoritos']);

        // PERFIL      
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        Route::get('/verPerfil/{id}', [ProfileController::class, 'verPerfil']);
        Route::get('/edirPerfil', [ProfileController::class, 'edit']);
    });
});

// RUTAS CREADAS PARA LOS ADMINISTRADORES QUE TE VERIFICA SI TIENES EL ROL DE ADMINISTRADOR Y SI LO TIENES PUEDES REALIZAR LAS ACCIONES DE ADMIN
Route::prefix('admin')->middleware(['auth', 'verified', 'mdrol:administrador'])->group(function () {
    //INICIO 
    Route::get('/inicio', [AdministracionController::class, 'inicio'])->name('adminInicio');            // VER INICIO DE ADMIN

    //USUARIO
    Route::get('/usuario', [AdministracionController::class, 'usuario'])->name('adminUsuario');         // VER TODOS LOS USUARIOS REGISTRADOS 
    Route::get('/eliminarUsuario/{id}', [AdministracionController::class, 'eliminarUsuario']);          // ELIMINAR USUARIO 
    Route::get('/editarUsuario/{id}', [AdministracionController::class, 'editarUsuario']);               // VER FORMULARIO EDITAR USUARIO 
    Route::post('/editUsuario/{id}', [AdministracionController::class, 'editUsuario']);                 
    Route::get('/addUsuario', [AdministracionController::class, 'addUsuario'])->name('verFormularioUsuario');
    Route::post('/addUser', [AdministracionController::class, 'addUser']);
    Route::get('/editRol/{id}', [AdministracionController::class, 'editRol']);
    Route::post('/editRol/{id}', [AdministracionController::class, 'editarRol']);
    Route::get('/verAdministrador', [AdministracionController::class, 'verAdministrador'])->name('verAdministrador');
    Route::get('/verUsuarios', [AdministracionController::class, 'verUsuario'])->name('verUsuario');
    Route::post('/buscadorUsuario', [AdministracionController::class, 'buscador']);

    //PRODUCTOS
    Route::get('/productos', [AdminProducto::class, 'productos'])->name('adminProducto');    // VER TODOS LOS PRODUCTOS 
    Route::get('/eliminarProducto/{id}', [AdminProducto::class, 'eliminarProducto']);        // ELIMINAR PRODUCTO 
    Route::get('/editProducto/{id}', [AdminProducto::class, 'editarProducto']);            // VER FORMULARIO DE EDITAR PRODUCTO 
    Route::post('/editarProducto/{id}', [AdminProducto::class, 'editProducto']);                    // EDITAR PRODUCTO 
    Route::get('/addProducto', [AdminProducto::class, 'verFormProducto'])->name('verFormularioProducto');
    Route::post('/addProducto', [AdminProducto::class, 'addProducto']);
    Route::get('/verConfirmar', [AdminProducto::class, 'verConfirmar'])->name('verConfirmar');
    Route::get('/confirmar/{id}', [AdminProducto::class, 'confirmar']);
    Route::get('/denegar/{id}', [AdminProducto::class, 'denegar']);
    Route::get('/verProducto/{id}', [AdminProducto::class, 'verProducto']);
    Route::post('/buscadorProducto', [AdminProducto::class, 'buscador']);

    //CATEGORIAS
    Route::get('/categorias', [AdminCategoría::class, 'categoria'])->name('adminCategoria');  // VER TODAS LAS CATEGORIAS 
    Route::get('/eliminarCategoria/{id}', [AdminCategoría::class, 'eliminar']);
    Route::get('/verAdd', [AdminCategoría::class, 'verAdd'])->name('verAddCategoria');
    Route::post('/addCategoria', [AdminCategoría::class, 'addCategoria']);

    //FAVORITOS
    Route::get('/favoritos', [AdminFavoritos::class, 'favorito'])->name('adminFavorito');     // VER TODOS LOS FAVORITOS
    Route::get('/eliminarFavorito/{id}', [AdminFavoritos::class, 'eliminar']);

    //OPINIONES
    Route::get('/opiniones', [AdministracionController::class, 'opiniones'])->name('adminOpiniones');   // VER TODAS LAS RESEÑAS 
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
