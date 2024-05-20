<?php

namespace App\Http\Controllers;

use App\Models\UsuarioOpinion;
use Illuminate\Http\Request;

class AdminOpiniones extends Controller
{
    public function opiniones(){
        $opiniones = UsuarioOpinion::with('usuarios', 'vendedores')->get();


        return view('admin.opinion', ['opiniones' => $opiniones]);
    }

    public function eliminar($id) {
        UsuarioOpinion::destroy($id);

        return redirect()->route('adminOpiniones');
    }

    public function verConfirmar() {

        $confirmaciones = UsuarioOpinion::where('estado', 'observacion')->with('usuarios', 'vendedores')->get();
        $numero = UsuarioOpinion::where('estado', 'observacion')->count();

        return view('admin.opiniones.verConfirmar', ['opiniones' => $confirmaciones, 'numero' => $numero]);
    }

    public function confirmar($id) {

        $opinion = UsuarioOpinion::where('id', $id)->first();
        $opinion->estado = 'activo';
        $opinion->save();

        return redirect()->route('verConfirmarOpinion');
    }

    public function denegar($id) {

        $opinion = UsuarioOpinion::where('id', $id)->first();
        $opinion->estado = 'denegado';
        $opinion->save();

        return redirect()->route('verConfirmarOpinion');
    }


    
}
