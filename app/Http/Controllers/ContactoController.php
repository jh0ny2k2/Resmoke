<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactoController extends Controller
{
    public function contacto () {

        return view('web.contacto.contacto');
    }

    public function misProductos() {

        return view('web.contacto.misProductos.misProductos');
    }

    public function editarProducto() {

        return view('web.contacto.misProductos.editarProducto');
    }

    public function productoEliminado() {

        return view('web.contacto.misProductos.productoEliminado');
    }

    public function comprarResmoke() {

        return view('web.contacto.comprar.comprar');
    }

    public function filtros() {

        return view('web.contacto.comprar.filtros');
    }

    public function favoritos() {

        return view('web.contacto.comprar.favoritos');
    } 
}
