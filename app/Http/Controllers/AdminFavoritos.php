<?php

namespace App\Http\Controllers;

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
}
