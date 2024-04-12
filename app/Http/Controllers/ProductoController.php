<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource. 
     */

    //VER TODOS
    public function index()
    {
        $productos = Producto::all();

        return view('web.productos', ['productos' => $productos]);
    }

    //VER TODOS POR CATEGORÍA
    public function indexCategoria($id)
    {
        $productos = Producto::where('categoriaId', $id)->get();

        return view('web.productos', ['productos' => $productos]);
    }

    //VER TODOS POR NOMBRE
    public function buscador(Request $request)
    {
        $productos = Producto::where('nombre', 'like', '%' . $request->buscador . '%')->get();

        return view('web.productos', ['productos' => $productos]);
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
    public function show($id)
    {
        $producto = Producto::where('id', $id)->first();

        return view('web.verproducto', ['producto' => $producto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        //
    }
}
