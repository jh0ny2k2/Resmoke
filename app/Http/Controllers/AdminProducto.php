<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\User;
use App\Models\UsuarioProducto;
use Illuminate\Http\Request;

class AdminProducto extends Controller
{
    // VER TODOS LOS PRODUCTOS
    public function productos(){
        $productos = Producto::with('categorias')->get();

        return view('admin.producto', ['productos' => $productos]);
    }

    // ELIMINAR PRODUCTO
    public function eliminarProducto($id) {
        Producto::destroy($id);

        return redirect()->back();
    }

    // VER EDITAR PRODUCTO
    public function editarProducto($id) {
        $producto = Producto::where('id', $id)->first();
        $categoria = Categoria::all();

        return view('admin.productos.editProducto', ['producto' => $producto, 'categorias' => $categoria]);
    }

    // EDITAR PRODUCTO
    public function editProducto(Request $request, $id) {

        $producto = Producto::where('id', $id)->first();
        $producto->nombre = $request->nombre;
        $producto->categoriaId = $request->categoria;
        $producto->precio = $request->precio;
        $producto->estado = $request->estado;
        $producto->descripcion = $request->descripcion;
        $producto->localizacion = $request->localizacion;
        $producto->save();
        
        return redirect()->route('adminProducto');
    }

    // VER AÑADIR DE PRODUCTO
    public function verFormProducto() {
        $categoria = Categoria::all();
        $usuarios = User::all();

        return view('admin.productos.addProducto', ['categorias' => $categoria, 'usuarios' => $usuarios]);
    }

    // AÑADIR PRODUCTO
    public function addProducto(Request $request) {
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->categoriaId = $request->categoria;
        $producto->precio = $request->precio;
        $producto->estado = $request->estado;
        $producto->descripcion = $request->descripcion;
        $producto->localizacion = $request->localizacion;
        $producto->estado = 'observacion';
        $producto->numeroVisto = 0;
        $producto->save();

        // Sacamos la id del producto
        $id = $producto->id;

        $product = new UsuarioProducto();
        $product->usuarioId = $request->usuario;
        $product->productoId = $id;
        $product->save();

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

        return redirect()->route('adminProducto');

    }

    // VER PRODUCTOS A CONFIRMAR
    public function verConfirmar() {
        $producto = Producto::where('estado', 'observacion')->get();
        $productos = Producto::where('estado', 'observacion')->count();

        return view('admin.productos.verConfirmar', ['productos' => $producto, 'numero' => $productos]);
    }

    // CONFIRMAR PRODUCTO
    public function confirmar($id) {

        $producto = Producto::where('id', $id)->first();
        $producto->estado = 'activo';
        $producto->save();

        return redirect()->route('verConfirmar');
    }

    // DENEGAR PRODUCTO
    public function denegar($id) {

        $producto = Producto::where('id', $id)->first();
        $producto->estado = 'denegado';
        $producto->save();

        return redirect()->route('verConfirmar');
    }

    // VER PRODUCTO
    public function verProducto($id) {
        $producto = Producto::with('categorias')->where('id', $id)->first();

        return view('admin.productos.verProducto', ['producto' => $producto]);
    }

    // BUSCADOR
    public function buscador(Request $request) {
        $producto = Producto::where('nombre', 'like', '%' . $request->buscador . '%')->get();

        return view('admin.producto', ['productos' => $producto]);
    }

}
