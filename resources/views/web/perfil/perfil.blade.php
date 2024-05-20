<x-navbarvproducto></x-navbarvproducto>

<div class="container mx-auto px-6 py-4">
    <a href="{{ url()->previous() }}" class="inline-flex items-center space-x-2 border-2 border-black text-black bg-white hover:bg-gray-100 py-2 px-4 focus:outline-none focus:ring-2 focus:ring-gray-300 rounded">
      <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 17l-5-5m0 0l5-5m-5 5h12" />
      </svg>
    </a>
  </div>

<div class="flex justify-center min-h-52">
        <div class="max-w-4xl w-full my-5 bg-white rounded-lg shadow-xl border ">
            <div class="flex justify-between items-center border-b p-8">
                <div class="flex items-center">
                    <img src="{{ asset('storage/fotoPerfil'. $usuario->id .'.png') }}" alt="Perfil" class="h-28 w-28 rounded-full object-cover mr-6 shadow-lg">
                    <div>
                        <h2 class="text-2xl font-semibold uppercase"> {{$usuario->name}} </h2>
                        <p class="text-gray-600"> {{$usuario->rol}} </p>
                    </div>
                </div>
                <a href="{{ route('editProfile') }}">
                    <button class="text-dark font-semibold py-2 px-4 border border-gray-400 rounded shadow-lg hover:bg-gray-300" >Editar</button>
                </a>
            </div>
            <div class="p-8">
                <h3 class="text-lg font-semibold text-gray-800 mb-4">Información de contacto</h3>
                <div class="grid grid-cols-2">
                    <p><strong>Correo electrónico:</strong> {{$usuario->email}} </p>
                    <p><strong>Teléfono:</strong> {{$usuario->telefono}} </p>
                    <p><strong>Fecha de nacimiento:</strong> {{ $usuario->fechaNacimiento }}</p>
                    <p><strong>Género:</strong> {{ $usuario->genero }}</p>
                    <p><strong>Dni:</strong> {{ $usuario->dni }}</p>
                </div>
            </div>
            <div class="px-8 pb-8 grid grid-cols-2 gap-4 text-center">
                <a href="{{ route('favoritos') }}" class="bg-white hover:bg-gray-300 text-dark border border-gray-400 shadow-lg font-bold py-2 px-4 rounded transition duration-200 ease-in-out">
                    Ver Favoritos
                </a>
                <a href="{{ route('venta') }}" class="bg-white hover:bg-gray-300 text-dark border border-gray-400 shadow-lg font-bold py-2 px-4 rounded transition duration-200 ease-in-out">
                    Ver Mis Productos
                </a>
            </div>
        </div>
    </div>

    <div class="flex justify-center min-h-52">
    <div class="max-w-4xl w-full my-5 bg-white rounded-lg border shadow-xl">
        <div class="p-8">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Algunos Comentarios</h3>
            <div class="grid grid-cols-2">
                @foreach ($opiniones as $opinion)

                    <article class="ml-2 mt-2 p-4 border border-gray-300 rounded">
                        <div class="flex items-center mb-4">
                        <img class="w-10 h-10 me-4 rounded-full" src="{{ asset('storage/fotoPerfil'. $opinion->usuarioId .'.png') }}" alt="">
                            <div class="font-medium dark:text-white">
                                <p>{{ $opinion->usuarios->name }}</p>
                            </div>
                        </div>
                        <footer class="mb-5 text-sm text-gray-500 dark:text-gray-400"><p>Opinado el <time datetime="2017-03-03 19:00">{{ $opinion->created_at }}</time></p></footer>
                        <p class="mb-2 text-gray-500 dark:text-gray-400">{{ $opinion->opinion }}</p>
                    </article>

                @endforeach
            </div>
        </div>
    </div>
</div>