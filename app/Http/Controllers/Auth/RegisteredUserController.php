<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use App\Mail\envioLoginMailable;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'genero' => $request->gender,
            'fechaNacimiento' => $request->fechaNacimiento,
            'telefono' => $request->telefono,
            'dni' => $request->dni,
            'password' => Hash::make($request->password),
            'rol' => 'usuario',
        ]);

        $correo = new envioLoginMailable();
        Mail::to($user->email)->send($correo);


        $id = $user->id;

        if ($request->hasFile('fotoPerfil')) {
            $request->file('fotoPerfil')->storeAs(
                'public',
                'fotoPerfil' . $id . '.png'
            );
        } else {
            $defaultPhotoPath = 'fotoNoPerfil.jpeg';
    
    // Ruta donde se debe copiar la foto predeterminada
    $targetPath = 'fotoPerfil' . $id . '.png';
    
    // Verificar si el archivo predeterminado existe
    if (Storage::disk('public')->exists($defaultPhotoPath)) {
        // Copiar la foto predeterminada al destino
        Storage::disk('public')->copy($defaultPhotoPath, $targetPath);
    } else {
        // Manejar el caso donde la foto predeterminada no existe
        abort(404, 'Default profile photo not found.');
    }
}

        event(new Registered($user));

        Auth::login($user);

        return redirect('/welcome');
    }
}
