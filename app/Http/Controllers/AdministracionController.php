<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\User;
use App\Models\UsuarioFavorito;
use App\Models\UsuarioOpinion;
use Illuminate\Http\Request;

class AdministracionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function inicio()
    {
        $usuarios = User::count();
        $productos = Producto::count();
        $categorias = Categoria::count();
        $favoritos = UsuarioFavorito::count();
        $opiniones = UsuarioOpinion::count();

        return view('admin.inicio', ['usuario' => $usuarios, 'productos' => $productos, 'categoria' => $categorias, 'favorito' => $favoritos, 'opinion' => $opiniones]);
    }

    
    /**
     * USUARIOS
     */
    public function usuario(){
        $usuarios = User::all();

        return view('admin.usuario', ['usuarios' => $usuarios]);
    }

    public function eliminarUsuario($id) {
        User::destroy($id);

        return redirect()->back();
    }

    public function editUsuario($id) {
        User::where('id', $id);

        return view('admin.usuarios.editUsuario');
    }



    /** 
     *  PRODUCTO
     */ 
    public function productos(){
        $productos = Producto::with('categorias')->get();

        return view('admin.producto', ['productos' => $productos]);
    }

    public function eliminarProducto($id) {
        Producto::destroy($id);
        return redirect()->back();
    }

    public function editarProducto($id) {
        $producto = Producto::where('id', $id);

        return view('admin.productos.editProducto', ['producto' => $producto]);
    }

    public function categoria(){
        $categorias = Categoria::all();

        return view('admin.categoria', ['categorias' => $categorias]);
    }

    public function favorito(){
        $favoritos = UsuarioFavorito::all();

        return view('admin.favorito', ['favoritos' => $favoritos]);
    }

    public function opiniones(){
        $opiniones = UsuarioOpinion::all();

        return view('admin.opinion', ['opiniones' => $opiniones]);
    }



}
