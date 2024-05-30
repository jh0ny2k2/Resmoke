<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Contacto;
use App\Models\Producto;
use App\Models\User;
use App\Models\UsuarioFavorito;
use App\Models\UsuarioOpinion;
use App\Models\UsuarioProducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdministracionController extends Controller
{
    // VER INICIO DE ADMINISTRACIÓN
    public function inicio()
    {
        $usuarios = User::count();
        $productos = Producto::count();
        $categorias = Categoria::count();
        $favoritos = UsuarioFavorito::count();
        $opiniones = UsuarioOpinion::count();
        $contacto = Contacto::count();
        $productoConfirmar = Producto::where('estado', 'observacion')->count();
        $opinionConfirmar = UsuarioOpinion::where('estado', 'observacion')->count();

        return view('admin.inicio', ['usuario' => $usuarios, 'productos' => $productos, 'categoria' => $categorias, 'favorito' => $favoritos, 'opinion' => $opiniones, 'contacto' => $contacto, 'contProduct' => $productoConfirmar, 'contOpinion' => $opinionConfirmar]);
    }

    
    // VER TODOS LOS USUARIOS
    public function usuario(){
        $usuarios = User::all();

        return view('admin.usuario', ['usuarios' => $usuarios]);
    }

    // ELIMINAR USUARIO
    public function eliminarUsuario($id) {
        User::destroy($id);

        return redirect()->back();
    }

    // VER EDITAR USUARIO
    public function editarUsuario($id) {
        $usuario = User::where('id', $id)->first();

        return view('admin.usuarios.editUsuario', ['usuario' => $usuario]);
    }

    // EDITAR USUARIO
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

    // VER AÑADIR USUARIO
    public function addUsuario() {

        return view('admin.usuarios.addUsuario');
    }

    // AÑADIR USUARIO
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

    // VER EDITAR ROL
    public function editRol($id) {
        $usuario = User::where('id', $id)->first();

        return view('admin.usuarios.editRol', ['usuario' => $usuario]);
    }

    // EDITAR ROL
    public function editarRol (Request $request, $id) {
        
        $usuario = User::where('id', $id)->first();
        $usuario->rol = $request->rol;
        $usuario->save();

        return redirect()->route('adminUsuario');
    }

    // VER USUARIOS ADMINISTRADORES
    public function verAdministrador() {
        $usuario = User::where('rol', 'administrador')->get();

        return view('admin.usuario', ['usuarios' => $usuario]);
    }

    // VER USUARIOS
    public function verUsuario() {
        $usuario = User::where('rol', 'usuario')->get();

        return view('admin.usuario', ['usuarios' => $usuario]);
    }

    // BUSCADOR USUARIOS POR NOMBRE
    public function buscador(Request $request) {
        $usuario = User::where('name', 'like', '%' . $request->buscador . '%')->get();

        return view ('admin.usuario', ['usuarios' => $usuario]);
    }
    
}
