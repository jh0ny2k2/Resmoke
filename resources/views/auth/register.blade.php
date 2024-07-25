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

        <!-- Fecha de nacimiento -->
        <div>
            <x-text-input id="fechaNacimiento" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm text-gray-400 placeholder-gray-900 focus:ring-black focus:border-black" placeholder="Fecha de nacimiento" type="date" name="fechaNacimiento" :value="old('fechaNacimiento')" required autofocus autocomplete="fechaNacimiento" />
            <x-input-error :messages="$errors->get('fechaNacimiento')" class="mt-2" />
        </div>

        <!-- Teléfono -->
        <div>
            <x-text-input id="telefono" class="block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:ring-black focus:border-black" placeholder="Número de teléfono" type="text" name="telefono" maxlength="9" :value="old('telefono')" required autofocus autocomplete="telefono" />
            <x-input-error :messages="$errors->get('telefono')" class="mt-2" />
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

        <!-- Foto de perfil-->
        <div class="w-full max-w-md mt-6 flex justify-center">
            <div class="relative w-40 h-40 border-2 border-dashed border-gray-300 rounded-full overflow-hidden flex items-center justify-center hover:border-gray-900 cursor-pointer">
                <input type="file" id="fotoPerfil" name="fotoPerfil" class="absolute w-full h-full opacity-0 cursor-pointer" onchange="updateBackground(this)" />
                <div id="fotoPerfilLabel" class="w-full h-full flex items-center justify-center" style="background-size: cover; background-position: center; background-repeat: no-repeat;">
                    <span class="text-gray-400">Foto de Perfil</span>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('¿Ya estás registrado?, Inicia Sesión') }}
            </a>

        </div>

        <x-primary-button class="ms-4">
            {{ __('Registrarse') }}
        </x-primary-button>
    </form>
</x-guest-layout>

<!-- SCRIPT PARA ACTUALIZAR LA VISTA PREVIA DE LAS FOTOS -->
<script>
  function updateBackground(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    document.getElementById('fotoPerfilLabel').style.backgroundImage = 'url(' + e.target.result + ')';
                    document.getElementById('fotoPerfilLabel').querySelector('span').style.display = 'none';
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
</script>