<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\User;
use App\Models\UsuarioFavorito;
use App\Models\UsuarioProducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource. 
     */

    //VER TODOS
    public function index()
    {
        $productos = Producto::where('estado', 'activo')->get();

        return view('web.productos', ['productos' => $productos]);
    }

    //VER TODOS POR CATEGORÍA
    public function indexCategoria($id)
    {
        $productos = Producto::where('categoriaId', $id)->where('estado', 'activo')->get();

        return view('web.productos', ['productos' => $productos]);
    }

    //VER TODOS POR NOMBRE
    public function buscador(Request $request)
    {
        $productos = Producto::where('nombre', 'like', '%' . $request->buscador . '%')->get();

        return view('web.productos', ['productos' => $productos]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();

        return view('web.addProducto', ['categorias' => $categorias]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        // TABLA DE PRODUCTO

            // Datos del producto 
            $producto = new Producto();
            $producto->categoriaId = $request->categoria;
            $producto->nombre = $request->nombreProducto;
            $producto->precio = $request->precioProducto;
            $producto->estado = 'observacion';
            $producto->descripcion = $request->descripcionProducto;
            $producto->localizacion = $request->localizacion;
            $producto->numeroVisto = 0;
            $producto->save();

            // Sacamos la id del producto
            $id = $producto->id;

            // TABLA DE USUARIO-PRODUCTO

            // Datos de producto tabla intermedia
            $usuarioProducto = new UsuarioProducto();
            $usuarioProducto->productoId = $id;
            $usuarioProducto->usuarioId = Auth::user()->id;
            $usuarioProducto->save();

            // Imagenes del producto
            $request->file('fotoPrincipal')->storeAs(
                'public',
                'producto_' . $id . '.jpg'
            );
    
            $request->file('fotoExtra1')->storeAs(
                'public',
                'producto_' . $id . 'Extra1.jpg'
            );
            $request->file('fotoExtra2')->storeAs(
                'public',
                'producto_' . $id . 'Extra2.jpg'
            );
            $request->file('fotoExtra3')->storeAs(
                'public',
                'producto_' . $id . 'Extra3.jpg'
            );
            $request->file('fotoExtra4')->storeAs(
                'public',
                'producto_' . $id . 'Extra4.jpg'
            );


            return redirect()->route('verTodos');
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {

        $producto = Producto::where('id', $id)->first();
        if ($producto) {
            $producto->numeroVisto = ($producto->numeroVisto ?? 0) + 1;
            $producto->save();
        }

        $productoo = UsuarioProducto::where('productoId', $id)->with('usuarios')->first();

        return view('web.verproducto', ['producto' => $producto, 'productoo' => $productoo]);
    }

    public function verMisProductos() {
        $usuario = User::where('id', Auth::user()->id)->first();
        $productoVenta = UsuarioProducto::where('usuarioId', Auth::user()->id)->with('productos')->get();

        return view('web.perfil.enVenta', ['usuario' => $usuario, 'productos' => $productoVenta]);
    }

    public function ponerReservado($id) {

        $producto = Producto::where('id', $id)->first();
        $producto->estado = 'reservado';
        $producto->save();

        return redirect()->back();
    }

    public function ponerVendido($id) {

        $producto = Producto::where('id', $id)->first();
        $producto->estado = 'vendido';
        $producto->save();

        return redirect()->back();
    }

    public function quitarVendido($id) {
        $producto = Producto::where('id', $id)->first();
        $producto->estado = 'activo';
        $producto->save();

        return redirect()->back();
    }

}
