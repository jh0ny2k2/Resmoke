<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UsuarioFavorito;
use Illuminate\Http\Request;

class AdminFavoritos extends Controller
{
    
    public function favorito(){
        $favoritos = UsuarioFavorito::with('usuarios')->with('productos')->get();

        return view('admin.favorito', ['favoritos' => $favoritos]);
    }

    public function eliminar($id)  {
        
        UsuarioFavorito::destroy($id);

        return redirect()->back();
    }

    public function buscar(Request $request) {
        $usuarios = User::where('name', 'like', '%' . $request->buscador . '%')->get();

        foreach ($usuarios as $usuario) {
            
            $favoritos = UsuarioFavorito::where('usuarioId', $usuario->id)->get();
        
        }

        return view('admin.favorito', ['favoritos' => $favoritos]);
    }
}
