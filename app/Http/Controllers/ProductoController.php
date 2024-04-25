<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
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
        $productos = Producto::where('categoriaId', $id)->get();

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
            $request->file('fotoPricipal')->storeAs(
                'public',
                'fotoPrincipal' . $id . '.png'
            );

            $request->file('fotoExtra1')->storeAs(
                'public',
                'fotoExtra1' . $id . '.png'
            );

            $request->file('fotoExtra2')->storeAs(
                'public',
                'fotoExtra2' . $id . '.png'
            );

            $request->file('fotoExtra3')->storeAs(
                'public',
                'fotoExtra3' . $id . '.png'
            );

            $request->file('fotoExtra4')->storeAs(
                'public',
                'fotoExtra4' . $id . '.png'
            );


            return redirect()->back();
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $favorito = UsuarioFavorito::where('usuarioId', Auth::user()->dni)->where('productoId', $id)->exists();

        $producto = Producto::where('id', $id)->first();
        $producto->numeroVisto = ($producto->numeroVisto) + 1;
        $producto->save();

        return view('web.verproducto', ['producto' => $producto, 'favorito' => $favorito]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
