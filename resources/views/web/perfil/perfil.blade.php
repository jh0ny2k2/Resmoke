<x-navbarvproducto></x-navbarvproducto>

<div class="container mx-auto px-6 py-4">
    <a href="{{ url()->previous() }}" class="inline-flex items-center space-x-2 border-2 border-black text-black bg-white hover:bg-gray-100 py-2 px-4 focus:outline-none focus:ring-2 focus:ring-gray-300 rounded">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
      </svg>
    </a>
  </div>

<div class="flex justify-center min-h-52">
        <div class="max-w-4xl w-full my-5 bg-white rounded-lg shadow-xl">
            <div class="flex justify-between items-center border-b p-8">
                <div class="flex items-center">
                    <img src="{{ asset('storage/fotoPerfil'. $usuario->id .'.png') }}" alt="Perfil" class="h-28 w-28 rounded-full object-cover mr-6">
                    <div>
                        <h2 class="text-2xl font-semibold uppercase"> {{$usuario->name}} </h2>
                        <p class="text-gray-600"> {{$usuario->rol}} </p>
                    </div>
                </div>
                <button class="text-dark font-semibold py-2 px-4 border border-dark rounded">Editar</button>
            </div>
            <div class="p-8">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Información de contacto</h3>
                <p><strong>Correo electrónico:</strong> {{$usuario->email}} </p>
                <p><strong>Teléfono:</strong> {{$usuario->telefono}} </p>
                <p><strong>Fecha de nacimiento:</strong> {{ $usuario->fechaNacimiento }}</p>
                <p><strong>Género:</strong> {{ $usuario->genero }}</p>
                <p><strong>Dni:</strong> {{ $usuario->dni }}</p>

            </div>
            <div class="px-8 pb-8 grid grid-cols-2 gap-4">
                <button class="bg-white hover:bg-gray-300 text-dark border border-dark font-bold py-2 px-4 rounded transition duration-200 ease-in-out">
                    Ver Favoritos
                </button>
                <button class="bg-white hover:bg-gray-300 text-dark border border-dark font-bold py-2 px-4 rounded transition duration-200 ease-in-out">
                    Ver Mis Productos
                </button>
            </div>
        </div>
    </div>