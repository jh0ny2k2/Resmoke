<x-guest-layout>

    <h2 class="mb-6 text-center text-3xl font-bold text-gray-900">Registro</h2>

    <form method="POST" class="space-y-4" enctype="multipart/form-data" action="{{ route('register') }}">
        @csrf

        <!-- Nombre -->
        <div>
            <x-text-input id="name" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:ring-black focus:border-black" placeholder="Nombre" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="mt-4">
            <x-text-input id="email" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:ring-black focus:border-black" placeholder="Correo Electrónico" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Genero -->
        <div class="mb-4">
            <select id="gender" name="gender" class="block w-full px-3 py-2 bg-white border text-gray-400 border-gray-300 placeholder-gray-400 rounded-md shadow-sm focus:outline-none focus:ring-gray-400 focus:border-dark">
                <option value="">Selecciona tu género</option>
                <option value="masculino">Masculino</option>
                <option value="femenino">Femenino</option>
                <option value="otro">Otro</option>
            </select>
        </div>

        <!-- Fecha de nacimiento -->
        <div>
            <x-text-input id="fechaNacimiento" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm text-gray-400 placeholder-gray-400 focus:ring-black focus:border-black" placeholder="Fecha de nacimiento" type="date" name="fechaNacimiento" :value="old('fechaNacimiento')" required autofocus autocomplete="fechaNacimiento" />
            <x-input-error :messages="$errors->get('fechaNacimiento')" class="mt-2" />
        </div>

        <!-- Teléfono -->
        <div>
            <x-text-input id="telefono" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:ring-black focus:border-black" placeholder="Número de teléfono" type="text" name="telefono" maxlength="9" :value="old('telefono')" required autofocus autocomplete="telefono" />
            <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
        </div>

        <!-- Dni -->
        <div>
            <x-text-input id="dni" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:ring-black focus:border-black" placeholder="Dni" type="text" maxlength="9" name="dni" :value="old('Dni')" required autofocus autocomplete="dni" />
            <x-input-error :messages="$errors->get('dni')" class="mt-2" />
        </div> 

        <!-- Contraseña -->
        <div class="mt-4">
            <x-text-input id="password" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:ring-black focus:border-black" placeholder="Contraseña" type="password" name="password" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirmar contraseña -->
        <div class="mt-4">
            <x-text-input id="password_confirmation" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:ring-black focus:border-black" placeholder="Confirmar Contraseña" type="password" name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <!-- Imagen de perfil -->
        <div>
            <label for="fotoPerfil" class="block mb-2 text-sm font-medium text-gray-400">Foto de Perfil</label>
            <input type="file" id="fotoPerfil" name="fotoPerfil"
              class="block w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-gray-50 file:text-gray-700 hover:file:bg-gray-100"/>
          </div>


        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('¿Ya estás registrado?, Inicia sesión') }}
            </a>

        </div>

        <x-primary-button class="ms-4">
            {{ __('Registrarse') }}
        </x-primary-button>
    </form>
</x-guest-layout>