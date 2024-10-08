<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacto;

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

    public function venderResmoke() {

        return view('web.contacto.vender.vender');
    }

    public function subirProducto() {

        return view('web.contacto.vender.subirProducto');
    }

    public function politicaAnuncios() {

        return view('web.contacto.vender.politica');
    }

    public function destacados() {

        return view('web.contacto.destacados.destacados');
    }

    public function queSon() {

        return view('web.contacto.destacados.queSon');
    }

    public function comoDestacar() {

        return view('web.contacto.destacados.comoDestacar');
    }

    public function comoCrearPerfil() {

        return view('web.contacto.perfil.comoCrearPerfil');
    }

    public function perfilContacto() {

        return view('web.contacto.perfil.perfilContacto');
    }

    public function valoraciones() {

        return view('web.contacto.perfil.valoraciones');
    }

    public function problemasPerfil() {

        return view('web.contacto.perfil.problemasPerfil');
    }

    public function editarPerfil() {

        return view('web.contacto.perfil.editarPerfil');
    }

    public function olvidadoContraseña() {

        return view('web.contacto.perfil.olvidadoContraseña');
    }

    public function eliminarCuenta() {

        return view('web.contacto.perfil.eliminarCuenta');
    }

    public function chatsContacto() {

        return view('web.contacto.chats.chatsContacto');
    }

    public function comoFunciona() {

        return view('web.contacto.chats.comoFunciona');
    }

    public function chatsBorrados() {

        return view('web.contacto.chats.chatsBorrados');
    }
    
    public function formularioContacto() {

        return view('web.contacto.formularioContacto');
    } 

    public function form(Request $request) {

        $contacto = new Contacto();
        $contacto->nombre = $request->nombre;
        $contacto->email = $request->email;
        $contacto->telefono = $request->telefono;
        $contacto->motivo = $request->motivo;
        $contacto->comentario = $request->comentario;
        $contacto->comoConociste = $request->comoConociste;
        $contacto->estado = 'pendiente';
        $contacto->save();

        return redirect()->route('contacto');
    }

    public function consejosSeguridad() {

        return view('web.contacto.consejos.consejos');
    } 







    public function normasResmoke() {

        return view('web.contacto.normas.normas');
    }








    public function leyServiciosDigitales() {

        return view('web.contacto.ley.ley');
    }

    public function recursosMecanismos() {

        return view('web.contacto.ley.recursos');
    }

    public function contenidoIlegal() {

        return view('web.contacto.ley.ilegal');
    }




    public function usoProteccionDatos() {

        return view('web.contacto.proteccion.proteccion');
    }

}
