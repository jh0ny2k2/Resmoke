<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // VER TODOS LOS CONTACTOS
    public function contacto(){
        $contacto = Contacto::where('estado', 'pendiente')->get();
        $contactoFin = Contacto::where('estado', 'visto')->get();

        return view('admin.contacto', ['contactos' => $contacto, 'contactoFin' => $contactoFin]);
    }

    // VER CONTACTO
    public function verContacto($id) {
        $contacto = Contacto::where('id', $id)->first();

        return view('admin.contacto.verContacto', ['contacto' => $contacto]);
    }

    // ACEPTAR CONTACTO
    public function aceptar($id){
        $contacto = Contacto::where('id', $id)->first();
        $contacto->estado = 'visto';
        $contacto->save();

        return redirect()->route('adminContacto');
    }

    // VER FORMULARIO DE CONTACTO WEB
    public function contactoWeb() {
        return view('web.contacto');
    }

    // GUARDAR CONTACTO WEB
    public function guardarContacto(Request $request){
        $contacto = new Contacto();
        $contacto->nombre = $request->nombre;
        $contacto->email = $request->email;
        $contacto->comentario = $request->comentario;
        $contacto->estado = 'pendiente';
        $contacto->save();

        return redirect()->route('welcome');
    }
}
