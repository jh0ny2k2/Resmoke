<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class AdminCategoría extends Controller
{
    // VER TODAS LAS CATEGORÍAS
    public function categoria(){
        $categorias = Categoria::all();

        return view('admin.categoria', ['categorias' => $categorias]);
    }

    // ELIMINAR CATEGORÍA
    public function eliminar($id) {
        Categoria::destroy($id);
        
        return redirect()->back();
    }

    // VER AÑADIR CATEGORÍA
    public function verAdd() {
        return view('admin.categorias.addCategoria');
    }

    // AÑADIR CATEGORÍA
    public function addCategoria(Request $request) {
        $categoria = new Categoria();
        $categoria->nombre = $request->nombre;
        $categoria->save();

        return redirect()->route('adminCategoria');
    }


}
