<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UsuarioOpinion;
use Illuminate\Http\Request;

class AdminOpiniones extends Controller
{
    // VER TODAS LAS OPINIONES
    public function opiniones(){
        $opiniones = UsuarioOpinion::with('usuarios', 'vendedores')->get();


        return view('admin.opinion', ['opiniones' => $opiniones]);
    }

    // ELIMINAR OPINION
    public function eliminar($id) {
        UsuarioOpinion::destroy($id);

        return redirect()->route('adminOpiniones');
    }

    // VER CONFIRMAR OPINION
    public function verConfirmar() {

        $confirmaciones = UsuarioOpinion::where('estado', 'revision')->with('usuarios', 'vendedores')->get();
        $numero = UsuarioOpinion::where('estado', 'revision')->count();

        return view('admin.opiniones.verConfirmar', ['opiniones' => $confirmaciones, 'numero' => $numero]);
    }

    // CONFIRMAR OPINION
    public function confirmar($id) {

        $opinion = UsuarioOpinion::where('id', $id)->first();
        $opinion->estado = 'activo';
        $opinion->save();

        return redirect()->route('verConfirmarOpinion');
    }

    // DENEGAR OPINION
    public function denegar($id) {

        $opinion = UsuarioOpinion::where('id', $id)->first();
        $opinion->estado = 'denegado';
        $opinion->save();

        return redirect()->route('verConfirmarOpinion');
    }
    
    // BUSCAR OPINION POR USUARIO
    public function buscar(Request $request) {
        $usuarios = User::where('name', 'like', '%' . $request->buscador . '%')->get();

        foreach ($usuarios as $usuario) {
            
            $opinion = UsuarioOpinion::where('usuarioId', $usuario->id)->get();
        
        }

        return view('admin.opinion', ['opiniones' => $opinion]);
    }

    
}
