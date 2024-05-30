<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UsuarioFavorito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioFavoritoController extends Controller
{
    // Función para añadir un producto a favoritos
    public function favorito($id) {
        
        $favorito = new UsuarioFavorito();
        $favorito->usuarioId = Auth::user()->id;
        $favorito->productoId = $id;
        $favorito->save();

        return redirect()->back();
    }

    // Función para eliminar un producto de favoritos
    public function deleteFavorito($id){

        UsuarioFavorito::where('productoId', $id)
               ->where('usuarioId', Auth::user()->id)
               ->delete();

        return redirect()->back();
    }

    // Función para ver los productos favoritos de un usuario
    public function verMisFavoritos() {
        $usuario = User::where('id', Auth::user()->id)->first();
        $usuarioFavorito = UsuarioFavorito::where('usuarioId', Auth::user()->id)->with('productos')->get();

        return view('web.perfil.favorito', ['usuario'=> $usuario, 'productos' => $usuarioFavorito]);
    }

}
