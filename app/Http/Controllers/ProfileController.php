<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\User;
use App\Models\UsuarioOpinion;
use App\Models\UsuarioProducto;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    // Función para ver formulario añadir una opinión
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    // Función para ver formulario añadir una opinión
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }

    // Función para ver formulario añadir una opinión
    public function verPerfil() {
        $usuario = User::where('id', Auth::user()->id)->first();
        $opiniones = UsuarioOpinion::where('vendedorId', Auth::user()->id)->where('estado', 'activo')->get();

        return view('web.perfil.perfil', ['usuario' => $usuario, 'opiniones' => $opiniones]);
    }

    // Función para ver formulario añadir una opinión
    public function edit() {
        $perfil = User::where('id', Auth::user()->id)->first();

        return view('web.perfil.editPerfil', ['usuario' => $perfil]);
    }

    // Función para ver formulario añadir una opinión
    public function editar(Request $request) {

        $usuario = User::where('id', Auth::user()->id)->first();
        $usuario->name = $request->nombre;
        $usuario->email = $request->email;
        $usuario->telefono = $request->telefono;
        $usuario->fechaNacimiento = $request->fechaNacimiento;
        $usuario->genero = $request->genero;
        $usuario->dni = $request->dni;
        $usuario->save();

        if ($request->hasFile('fotoPerfil')) {
            $request->file('fotoPerfil')->storeAs(
                'public',
                'fotoPerfil' . Auth::user()->id . '.png'
            );
        }

        return redirect()->route('verPerfil', ['id' => Auth::user()->id]);
    }

    // Función para ver formulario añadir una opinión
    public function verPerfilVendedor($id) {

        $usuario = User::where('id', $id)->first();

        return view('web.perfil.perfilVendedor', ['usuario' => $usuario]);
    }

    
}
