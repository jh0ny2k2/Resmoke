<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UsuarioOpinion;
use App\Models\UsuarioProducto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioOpinionController extends Controller
{
    public function addOpinion($id) {

        $usuario = User::where('id', $id)->first();

        return view('web.perfil.addOpinion', ['usuario' => $usuario]); 
    }

    public function add($id, Request $request) {

        $opinion = UsuarioOpinion::where('vendedorId', $id)->first();
        $opinion->usuarioId = Auth::user()->id;
        $opinion->vendedorId = $id;
        $opinion->opinion = $request->opinion;
        $opinion->estado = 'observacion';
        $opinion->save();

        return redirect()->back();
    }

    public function verOpiniones($id) {
        $usuario = User::where('id', $id)->first();
        $opiniones = UsuarioOpinion::where('vendedorId', $id)->where('estado', 'activo')->get();

        return view('web.perfil.perfilVendedorOpinion', ['usuario' => $usuario, 'opiniones' => $opiniones]);
    }

    public function verProductos($id) {
        $usuario = User::where('id', $id)->first();
        $productos = UsuarioProducto::where('usuarioId', $id)->with('productos')->get();

        return view('web.perfil.perfilVendedorProducto', ['usuario' => $usuario, 'productos' => $productos]);
    }




}
