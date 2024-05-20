<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use App\Models\User;
use App\Models\UsuarioFavorito;
use App\Models\UsuarioOpinion;
use App\Models\UsuarioProducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

    public function editarUsuario($id) {
        $usuario = User::where('id', $id)->first();

        return view('admin.usuarios.editUsuario', ['usuario' => $usuario]);
    }

    public function editUsuario(Request $request, $id) {
        
        $usuario = User::where('id', $id)->first();
        $usuario->name = $request->nombre;
        $usuario->email = $request->email;
        $usuario->genero = $request->genero;
        $usuario->fechaNacimiento = $request->fecha_nacimiento;
        $usuario->telefono = $request->telefono;
        $usuario->dni = $request->dni;
        $usuario->save();

        return redirect()->route('adminUsuario');
    }

    public function addUsuario() {

        return view('admin.usuarios.addUsuario');
    }

    public function addUser(Request $request){

        $usuario = new User();
        $usuario->name = $request->nombre;
        $usuario->password = Hash::make($request->password);
        $usuario->email = $request->email;
        $usuario->genero = $request->genero;
        $usuario->fechaNacimiento = $request->fecha_nacimiento;
        $usuario->telefono = $request->telefono;
        $usuario->dni = $request->dni;
        $usuario->rol = $request->rol;
        $usuario->save();

        return redirect()->route('adminUsuario');
    }

    public function editRol($id) {
        $usuario = User::where('id', $id)->first();

        return view('admin.usuarios.editRol', ['usuario' => $usuario]);
    }

    public function editarRol (Request $request, $id) {
        
        $usuario = User::where('id', $id)->first();
        $usuario->rol = $request->rol;
        $usuario->save();

        return redirect()->route('adminUsuario');
    }

    public function verAdministrador() {
        $usuario = User::where('rol', 'administrador')->get();

        return view('admin.usuario', ['usuarios' => $usuario]);
    }

    public function verUsuario() {
        $usuario = User::where('rol', 'usuario')->get();

        return view('admin.usuario', ['usuarios' => $usuario]);
    }

    public function buscador(Request $request) {
        $usuario = User::where('name', 'like', '%' . $request->buscador . '%')->get();

        return view ('admin.usuario', ['usuarios' => $usuario]);
    }
    
}
