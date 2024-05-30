<?php

namespace App\Http\Controllers;

use App\Models\Contacto;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function contacto(){
        $contacto = Contacto::orderBy('created_at', 'asc')->get();

        return view('admin.contacto', ['contactos' => $contacto]);
    }

    public function verContacto($id) {
        $contacto = Contacto::where('id', $id)->first();

        return view('admin.contacto.verContacto', ['contacto' => $contacto]);
    }

    public function aceptar($id){
        $contacto = Contacto::where('id', $id)->first();
        $contacto->estado = 'visto';
        $contacto->save();

        return redirect()->route('adminContacto');
    }

    public function contactoWeb() {
        return view('web.contacto');
    }

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
