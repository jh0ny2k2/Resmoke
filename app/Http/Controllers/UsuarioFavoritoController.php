<?php

namespace App\Http\Controllers;

use App\Models\UsuarioFavorito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioFavoritoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        
        
    
    }

    public function favorito($id) {
        
        $favorito = new UsuarioFavorito();
        $favorito->usuarioId = Auth::user()->id;
        $favorito->productoId = $id;
        $favorito->save();

        return redirect()->back();
    }

    public function deleteFavorito($id){

    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(UsuarioFavorito $usuarioFavorito)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UsuarioFavorito $usuarioFavorito)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UsuarioFavorito $usuarioFavorito)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UsuarioFavorito $usuarioFavorito)
    {
        //
    }
}
