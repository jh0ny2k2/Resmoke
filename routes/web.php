<?php

use App\Http\Controllers\AdminCategoría;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminFavoritos;
use App\Http\Controllers\AdministracionController;
use App\Http\Controllers\AdminOpiniones;
use App\Http\Controllers\AdminProducto;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PusherController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\UsuarioFavoritoController;
use App\Http\Controllers\UsuarioOpinionController;
use App\Http\Controllers\MailController;
use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Support\Facades\Route;


Route::get('/envioRegister', [MailController::class, 'envioRegister'])->name('envioRegister');


// RUTAS PARA LA WEB
Route::prefix('web')->group(function() {
    //Productos

    // VER TODOS LOS PRODUCTOS QUE HAY EN EL MOMENTO QUE ESTEN ACTIVOS
    Route::get('/verTodos', [ProductoController::class, 'index'])->name('verTodos');   
    
    // VER LOS PROYECTO PERO POR CATEGORIA
    Route::get('/verCategoria/{id}', [ProductoController::class, 'indexCategoria']); 
    
    // BUSCAR UN PRODUCTO POR NOMBRE 
    Route::post('/buscador', [ProductoController::class, 'buscador'])->name('buscador');  
    
    // VER MAS INFORMACION DE UN PRODUCTO EN ESPECÍFICO
    Route::get('/verProducto/{id}', [ProductoController::class, 'show'])->name('verProducto');  

    // VER FORMULARIO DE CONTACTO
    Route::get('/contacto', [AdminController::class, 'contactoWeb'])->name('contactoWeb');   

    // GUARDAR CONTACTO
    Route::post('/contacto', [AdminController::class, 'guardarContacto'])->name('guardarContacto'); 



    
    Route::get('/contact', [ContactoController::class, 'contacto'])->name('contacto');

    Route::get('/misProductos', [ContactoController::class, 'misProductos'])->name('misProductos');
    Route::get('/editarProducto', [ContactoController::class, 'editarProducto'])->name('editarProducto');
    Route::get('/productoEliminado`', [ContactoController::class, 'productoEliminado'])->name('productoEliminado');

    Route::get('/comprarResmoke', [ContactoController::class, 'comprarResmoke'])->name('comprarResmoke');
    Route::get('/filtros', [ContactoController::class, 'filtros'])->name('filtrosResmoke');
    Route::get('/favoritos', [ContactoController::class, 'favoritos'])->name('favoritosResmoke');

    Route::get('/venderResmoke', [ContactoController::class, 'venderResmoke'])->name('venderResmoke');
    Route::get('/subirProducto', [ContactoController::class, 'subirProducto'])->name('subirProducto');
    Route::get('/politicaAnuncios', [ContactoController::class, 'politicaAnuncios'])->name('policiticaAnuncios');

    Route::get('/Destacados', [ContactoController::class, 'destacados'])->name('destacadoContacto');
    Route::get('/queSon', [ContactoController::class, 'queSon'])->name('queSon');
    Route::get('/comoDestacar', [ContactoController::class, 'comoDestacar'])->name('comoDestacar');

    Route::get('/perfilContacto', [ContactoController::class, 'perfilContacto'])->name('perfilContacto');
    Route::get('/comoCrearPerfil', [ContactoController::class, 'comoCrearPerfil'])->name('comoCrearPerfil');
    Route::get('/valoraciones', [ContactoController::class, 'valoraciones'])->name('valoraciones');
    Route::get('/problemasPerfil', [ContactoController::class, 'problemasPerfil'])->name('problemasPerfil');
    Route::get('/editarPerfil', [ContactoController::class, 'editarPerfil'])->name('editarPerfil');
    Route::get('/olvidadoContraseña', [ContactoController::class, 'olvidadoContraseña'])->name('olvidadoContraseña');
    Route::get('/eliminarCuenta', [ContactoController::class, 'eliminarCuenta'])->name('eliminarCuenta');

    Route::get('/chatsContacto', [ContactoController::class, 'chatsContacto'])->name('chatsContacto');
    Route::get('/comoFunciona', [ContactoController::class, 'comoFunciona'])->name('comoFunciona');
    Route::get('/chatsBorrados', [ContactoController::class, 'chatsBorrados'])->name('chatsBorrados');






    Route::get('/consejosSeguridad', [ContactoController::class, 'consejosSeguridad'])->name('consejosSeguridad');

    Route::get('/normasResmoke', [ContactoController::class, 'normasResmoke'])->name('normasResmoke');

    Route::get('/leyServiciosDigitales', [ContactoController::class, 'leyServiciosDigitales'])->name('leyServiciosDigitales');
    Route::get('/recursosMecanismos', [ContactoController::class, 'recursosMecanismos'])->name('recursosMecanismos');
    Route::get('/contenidoIlegal', [ContactoController::class, 'contenidoIlegal'])->name('contenidoIlegal');

    Route::get('/usoProteccionDatos', [ContactoController::class, 'usoProteccionDatos'])->name('usoProteccionDatos');










    Route::get('/formularioContacto', [ContactoController::class, 'formularioContacto'])->name('formularioContacto');
    Route::post('/form', [ContactoController::class, 'form'])->name('form');

    










    
    // RUTAS DE LA WEB PERO PARA LOS QUE ESTAN REGISTRADOS O LOGUEADOSS
    Route::middleware('auth')->group(function () {

        // PRODUCTOS

        //VER FORMULARIO AÑADIR PRODUCTO
        Route::get('/addProducto', [ProductoController::class, 'create'])->name('addProducto');

        //AÑADIR PRODUCTO A LA VENTA
        Route::post('/addproducto', [ProductoController::class, 'store'])->name('storeProducto');

        //VER FORMULARIO EDITAR PRODUCTO  
        Route::get('/editProducto/{id}', [ProductoController::class, 'edit']);  
        
        //EDITAR PRODUCTO
        Route::post('/editarProducto/{id}', [ProductoController::class, 'editar']);  

        //ELIMINAR PRODUCTO
        Route::get('/eliminarProducto/{id}/{i}', [ProductoController::class, 'destroy']); 
        
        
        
        
        
        
        
        
        //MARCAR COMO VENDIDO 
        Route::get('/formularioVendido/{id}', [ProductoController::class, 'vender']);
        Route::post('/buscadorUsuarioVender/{id}', [ProductoController::class, 'buscadorUsuario']);
        Route::get('/precioVender/{id}/{usuarioId}', [ProductoController::class, 'precioVender']);
        Route::post('/precioVendido/{id}/{usuarioId}', [ProductoController::class, 'precioVendido']);
        Route::get('/vender/{id}/{usuarioId}', [ProductoController::class, 'vendido']);
        
        Route::get('/formularioReservado/{id}', [ProductoController::class, 'reservado']);
        Route::post('/buscadorUsuarioReservado/{id}', [ProductoController::class, 'buscadorUsuarioReservado']);
        Route::get('/precioReservado/{id}/{usuarioId}', [ProductoController::class, 'precioReservado']);
        Route::post('/precioReservado/{id}/{usuarioId}', [ProductoController::class, 'precioReserva']);
        Route::get('/reservado/{id}/{usuarioId}', [ProductoController::class, 'reserva']);

        Route::get('/ocultarProducto/{id}', [ProductoController::class, 'ocultar']);
        Route::get('/quitarOcultoProducto/{id}', [ProductoController::class, 'quitarOculto']);

        Route::get('/eliminarProducto/{id}', [ProductoController::class, 'eliminar']);


        // FAVORITOS

        //AÑADIR A FAVORITO
        Route::get('/addFavorito/{id}', [UsuarioFavoritoController::class, 'favorito']);        
        
        //ELIMINAR UN FAVORITO    
        Route::get('/deleteFavorito/{id}', [UsuarioFavoritoController::class, 'deleteFavorito']);           

        //PONER RESERVADO
        Route::get('/reservado/{id}', [ProductoController::class, 'ponerReservado']);               
        
        //PONER VENDIDO
        Route::get('/vendido/{id}', [ProductoController::class, 'ponerVendido']);                  
        
        //QUITAR RESERVADO
        Route::get('/quitarReservado/{id}', [ProductoController::class, 'quitarVendido']);         
        
        //QUITAR VENDIDO
        Route::get('/quitarVendido/{id}', [ProductoController::class, 'quitarVendido']);           

        // VER MIS PRODUCTOS
        Route::get('/productoVenta', [ProductoController::class, 'verMisProductos'])->name('venta'); 

        // VER MIS FAVORITOS
        Route::get('/verFavoritos', [UsuarioFavoritoController::class, 'verMisFavoritos'])->name('favoritos'); 

        Route::get('/compras', [ProductoController::class, 'verMisCompras'])->name('compras');

        // PERFIL      

        //VER PERFIL
        Route::get('/verPerfil', [ProfileController::class, 'verPerfil'])->name('verPerfil');

        //EDITAR PERFIL
        Route::get('/editPerfil', [ProfileController::class, 'edit'])->name('editProfile');

        //GUARDAR PERFIL
        Route::post('/editPerfil', [ProfileController::class, 'editar']);

        //VER PERFIL DE OTRO USUARIO
        Route::get('/verPerfilVendedor/{id}', [ProfileController::class, 'verPerfilVendedor']);

        //VER MIS PRODUCTOS
        Route::get('/verProductosVendedor/{id}', [UsuarioOpinionController::class, 'verProductos']);

        //VER MIS OPINIONES
        Route::get('/verOpinionesVendedor/{id}', [UsuarioOpinionController::class, 'verOpiniones'])->name('verOpinionesVendedor');

        //VER MIS OPINIONES
        Route::get('/addOpinion/{id}', [UsuarioOpinionController::class, 'addOpinion']);

        //AÑADIR OPINION
        Route::post('/addOpinion/{id}', [UsuarioOpinionController::class, 'add']);
    });
});

// RUTAS CREADAS PARA LOS ADMINISTRADORES QUE TE VERIFICA SI TIENES EL ROL DE ADMINISTRADOR Y SI LO TIENES PUEDES REALIZAR LAS ACCIONES DE ADMIN
Route::prefix('admin')->middleware(['auth', 'verified', 'mdrol:administrador'])->group(function () {
    //INICIO 

    // VER INICIO DE ADMIN
    Route::get('/inicio', [AdministracionController::class, 'inicio'])->name('adminInicio');            

    //USUARIO

    // VER TODOS LOS USUARIOS REGISTRADOS 
    Route::get('/usuario', [AdministracionController::class, 'usuario'])->name('adminUsuario');     
    
    // ELIMINAR USUARIO 
    Route::get('/eliminarUsuario/{id}', [AdministracionController::class, 'eliminarUsuario']); 
    
    // VER FORMULARIO EDITAR USUARIO 
    Route::get('/editarUsuario/{id}', [AdministracionController::class, 'editarUsuario']);    
    
    // EDITAR USUARIO
    Route::post('/editUsuario/{id}', [AdministracionController::class, 'editUsuario']);    
    
    // VER FORMULARIO AÑADIR USUARIO
    Route::get('/addUsuario', [AdministracionController::class, 'addUsuario'])->name('verFormularioUsuario');

    // AÑADIR USUARIO
    Route::post('/addUser', [AdministracionController::class, 'addUser']);

    // VER FORMILARIO EDITAR ROLES
    Route::get('/editRol/{id}', [AdministracionController::class, 'editRol']);

    // EDITAR ROL
    Route::post('/editRol/{id}', [AdministracionController::class, 'editarRol']);

    // VER ADMINISTRADOR
    Route::get('/verAdministrador', [AdministracionController::class, 'verAdministrador'])->name('verAdministrador');

    // VER USUARIOS
    Route::get('/verUsuarios', [AdministracionController::class, 'verUsuario'])->name('verUsuario');

    // BUSCADOR DE USUARIOS
    Route::post('/buscadorUsuario', [AdministracionController::class, 'buscador']);

    //PRODUCTOS

    // VER TODOS LOS PRODUCTOS 
    Route::get('/productos', [AdminProducto::class, 'productos'])->name('adminProducto');    

    // ELIMINAR PRODUCTO 
    Route::get('/eliminarProducto/{id}', [AdminProducto::class, 'eliminarProducto']); 
    
    // VER FORMULARIO DE EDITAR PRODUCTO 
    Route::get('/editProducto/{id}', [AdminProducto::class, 'editarProducto']);       
    
    // EDITAR PRODUCTO 
    Route::post('/editarProducto/{id}', [AdminProducto::class, 'editProducto']);           
    
    // VER FORMULARIO AÑADIR PRODUCTO
    Route::get('/addProducto', [AdminProducto::class, 'verFormProducto'])->name('verFormularioProducto');

    // AÑADIR PRODUCTO
    Route::post('/addProducto', [AdminProducto::class, 'addProducto']);

    // VER CONFIRMAR PRODUCTO
    Route::get('/verConfirmar', [AdminProducto::class, 'verConfirmar'])->name('verConfirmar');

    // CONFIRMAR PRODUCTO
    Route::get('/confirmar/{id}', [AdminProducto::class, 'confirmar']);

    // DENEGAR PRODUCTO
    Route::get('/denegar/{id}', [AdminProducto::class, 'denegar']);

    // VER PRODUCTO
    Route::get('/verProducto/{id}', [AdminProducto::class, 'verProducto']);

    // BUSCADOR DE PRODUCTOS
    Route::post('/buscadorProducto', [AdminProducto::class, 'buscador']);

    //CATEGORIAS

    // VER TODAS LAS CATEGORIAS 
    Route::get('/categorias', [AdminCategoría::class, 'categoria'])->name('adminCategoria'); 
    
    // ELIMINAR CATEGORIA
    Route::get('/eliminarCategoria/{id}', [AdminCategoría::class, 'eliminar']);

    // VER FORMULARIO EDITAR CATEGORIA
    Route::get('/verAdd', [AdminCategoría::class, 'verAdd'])->name('verAddCategoria');

    // AÑADIR CATEGORIA
    Route::post('/addCategoria', [AdminCategoría::class, 'addCategoria']);

    //FAVORITOS

    // VER TODOS LOS FAVORITOS
    Route::get('/favoritos', [AdminFavoritos::class, 'favorito'])->name('adminFavorito');  
    
    // VER TODOS LOS FAVORITOS
    Route::get('/eliminarFavorito/{id}', [AdminFavoritos::class, 'eliminar']);

    // VER TODOS LOS FAVORITOS
    Route::post('/buscarFavorito', [AdminFavoritos::class, 'buscar'])->name('buscarFavorito');

    //OPINIONES

    // VER TODAS LAS RESEÑAS
    Route::get('/opiniones', [AdminOpiniones::class, 'opiniones'])->name('adminOpiniones');    
    
    // BUSCADOR DE OPINIONES
    Route::post('/buscarOpinion', [AdminOpiniones::class, 'buscar'])->name('buscarOpinion');

    // ELIMINAR OPINION
    Route::get('/eliminarOpinion/{id}', [AdminOpiniones::class, 'eliminar']);

    // VER CONFIRMAR OPINION
    Route::get('/verConfirmarOpinion', [AdminOpiniones::class, 'verConfirmar'])->name('verConfirmarOpinion');

    // CONFIRMAR OPINION
    Route::get('/confirmarOpinion/{id}', [AdminOpiniones::class, 'confirmar']);

    // DENEGAR OPINION
    Route::get('/denegarOpinion/{id}', [AdminOpiniones::class, 'denegar']);

    //CONTACTO

    // VER TODOS LOS CONTACTOS
    Route::get('/contacto', [AdminController::class, 'contacto'])->name('adminContacto');

    // VER CONTACTO
    Route::get('/verContacto/{id}', [AdminController::class, 'verContacto']);

    // ACEPTAR CONTACTO
    Route::get('/aceptarContacto/{id}', [AdminController::class, 'aceptar']);
});

// RUTA CREADA PARA CERRAR SESIÓN
Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('milogout');

// RUTA PARA EL INICIO DE LA PAGINA
Route::get('/', function () {
    $categorias = Categoria::all();
    $producto = Producto::with('categorias')->where('estado', 'activo')->inRandomOrder()->take(6)->get();

    return view('welcome', ['categorias' => $categorias, 'productos' => $producto]);
});

// RUTA PARA VOLVER A LA PAGINA DE INICIO 
Route::get('/welcome', function () {
    $categorias = Categoria::all();
    $producto = Producto::with('categorias')->where('estado', 'activo')->inRandomOrder()->take(6)->get();

    return view('welcome', ['categorias' => $categorias, 'productos' => $producto]);
})->name('welcome');



require __DIR__.'/auth.php';
