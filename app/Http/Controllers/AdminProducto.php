<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\User;
use App\Models\UsuarioProducto;
use Illuminate\Http\Request;

class AdminProducto extends Controller
{
    public function productos(){
        $productos = Producto::with('categorias')->get();

        return view('admin.producto', ['productos' => $productos]);
    }

    public function eliminarProducto($id) {
        Producto::destroy($id);

        return redirect()->back();
    }

    public function editarProducto($id) {
        $producto = Producto::where('id', $id)->first();
        $categoria = Categoria::all();

        return view('admin.productos.editProducto', ['producto' => $producto, 'categorias' => $categoria]);
    }

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

    public function verFormProducto() {
        $categoria = Categoria::all();
        $usuarios = User::all();

        return view('admin.productos.addProducto', ['categorias' => $categoria, 'usuarios' => $usuarios]);
    }

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

        return redirect()->route('adminProducto');

    }

    public function verConfirmar() {
        $producto = Producto::where('estado', 'observacion')->get();
        $productos = Producto::where('estado', 'observacion')->count();

        return view('admin.productos.verConfirmar', ['productos' => $producto, 'numero' => $productos]);
    }

    public function confirmar($id) {

        $producto = Producto::where('id', $id)->first();
        $producto->estado = 'activo';
        $producto->save();

        return redirect()->route('verConfirmar');
    }

    public function denegar($id) {

        $producto = Producto::where('id', $id)->first();
        $producto->estado = 'denegado';
        $producto->save();

        return redirect()->route('verConfirmar');
    }

    public function verProducto($id) {
        $producto = Producto::with('categorias')->where('id', $id)->first();

        return view('admin.productos.verProducto', ['producto' => $producto]);
    }

}