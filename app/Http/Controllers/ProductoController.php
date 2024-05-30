<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\User;
use App\Models\UsuarioFavorito;
use App\Models\UsuarioProducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProductoController extends Controller
{
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

    //VER FORMULARIO DE CREAR PRODUCTO
    public function create()
    {
        $categorias = Categoria::all();

        return view('web.addProducto', ['categorias' => $categorias]);
    }

    //GUARDAR PRODUCTO
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
    
            if ($request->hasFile('fotoExtra1')) {
                $request->file('fotoExtra1')->storeAs(
                    'public',
                    'producto_' . $id . 'Extra1.jpg'
                );
            }

            if ($request->hasFile('fotoExtra2')) {
                $request->file('fotoExtra2')->storeAs(
                    'public',
                    'producto_' . $id . 'Extra2.jpg'
                );
            }

            if ($request->hasFile('fotoExtra3')) {
                $request->file('fotoExtra3')->storeAs(
                    'public',
                    'producto_' . $id . 'Extra3.jpg'
                );
            }

            if ($request->hasFile('fotoExtra4')) {
                $request->file('fotoExtra4')->storeAs(
                    'public',
                    'producto_' . $id . 'Extra4.jpg'
                );
            }

            return redirect()->route('verTodos');
        
    }

    //VER UN PRODUCTO
    public function show($id)
    {

        $producto = Producto::where('id', $id)->first();
        if ($producto) {
            $producto->numeroVisto = ($producto->numeroVisto ?? 0) + 1;
            $producto->save();
        }

        $productoo = UsuarioProducto::where('productoId', $id)->with('usuarios')->first();

        
        if (Auth::check()) {
            $favorito = UsuarioFavorito::where('productoId', $id)->where('usuarioId', Auth::user()->id)->exists();
        } else {
            $favorito = false;
        }
        
        return view('web.verproducto', ['producto' => $producto, 'productoo' => $productoo, 'favorito' => $favorito]);
    }

    // VER MIS PRODUCTOR
    public function verMisProductos() {
        $usuario = User::where('id', Auth::user()->id)->first();
        $productoVenta = UsuarioProducto::where('usuarioId', Auth::user()->id)->with('productos')->get();

        return view('web.perfil.enVenta', ['usuario' => $usuario, 'productos' => $productoVenta]);
    }

    // PONER PRODUCTO COMO RESERVADO
    public function ponerReservado($id) {

        $producto = Producto::where('id', $id)->first();
        $producto->estado = 'reservado';
        $producto->save();

        return redirect()->back();
    }

    // PONER PRODUCTO COMO VENDIDO
    public function ponerVendido($id) {

        $producto = Producto::where('id', $id)->first();
        $producto->estado = 'vendido';
        $producto->save();

        return redirect()->back();
    }

    // QUITAR PRODUCTO COMO VENDIDO
    public function quitarVendido($id) {
        $producto = Producto::where('id', $id)->first();
        $producto->estado = 'activo';
        $producto->save();

        return redirect()->back();
    }

    // VER FORMULARIO EDITAR PRODUCTO
    public function edit($id) {

        $producto = Producto::where('id', $id)->first();
        $categorias = Categoria::all();

        return view('web.editProducto', ['producto' => $producto, 'categorias' => $categorias]);
    }

    // EDITAR PRODUCTO
    public function editar(Request $request, $id) {

            $producto = Producto::where('id', $id)->first();
            $producto->categoriaId = $request->categoria;
            $producto->nombre = $request->nombreProducto;
            $producto->precio = $request->precioProducto;
            $producto->descripcion = $request->descripcionProducto;
            $producto->localizacion = $request->localizacion;
            $producto->save();

            // Sacamos la id del producto
            $id = $producto->id;

            // Imagenes del producto
            if ($request->hasFile('fotoPrincipal')) {
                $request->file('fotoPrincipal')->storeAs(
                    'public',
                    'producto_' . $id . '.jpg'
                );
            }
    
            if ($request->hasFile('fotoExtra1')) {
                $request->file('fotoExtra1')->storeAs(
                    'public',
                    'producto_' . $id . 'Extra1.jpg'
                );
            }

            if ($request->hasFile('fotoExtra2')) {
                $request->file('fotoExtra2')->storeAs(
                    'public',
                    'producto_' . $id . 'Extra2.jpg'
                );
            }

            if ($request->hasFile('fotoExtra3')) {
                $request->file('fotoExtra3')->storeAs(
                    'public',
                    'producto_' . $id . 'Extra3.jpg'
                );
            }

            if ($request->hasFile('fotoExtra4')) {
                $request->file('fotoExtra4')->storeAs(
                    'public',
                    'producto_' . $id . 'Extra4.jpg'
                );
            }

            return redirect()->route('verProducto', ['id' => $id]);

    }

    // ELIMINAR FOTO EDITAR PRODUCTO   
    public function destroy($id, $i)
    {
       $nombre = 'producto_' . $id . 'Extra'. $i .'.jpg';

         Storage::delete('public/' . $nombre);

         return redirect()->back();
    }

}
