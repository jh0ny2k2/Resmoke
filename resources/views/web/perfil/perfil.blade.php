<!-- BARRA DE NAVEGACION -->
<x-navbarvproducto></x-navbarvproducto>

<!-- BOTON VOLVER ATRAS -->
<x-boton-atras></x-boton-atras>

<!-- PERFIL -->
<div class="flex justify-center min-h-52">
        <div class="max-w-4xl w-full my-5 bg-white rounded-lg shadow-xl border ">
        <div class="flex flex-col md:flex-row justify-between items-center border-b p-4 md:p-8">
    <div class="flex flex-col md:flex-row items-center">

        <!-- FOTO DE PERFIL -->
        <img src="{{ asset('storage/fotoPerfil'. $usuario->id .'.png') }}" alt="Perfil" class="h-24 w-24 md:h-28 md:w-28 rounded-full object-cover mr-0 md:mr-6 mb-4 md:mb-0 shadow-lg">
        
        <div class="text-center md:text-left">

            <!-- NOMBRE -->
            <h2 class="text-xl md:text-2xl font-semibold uppercase"> {{$usuario->name}} </h2>

            <!-- ROL -->
            <p class="text-gray-600 text-sm md:text-base"> {{$usuario->rol}} </p>
        </div>
    </div>

    <!-- EDITAR PERFIL -->
    <a href="{{ route('editProfile') }}" class="mt-4 md:mt-0">
        <button class="text-dark font-semibold py-2 px-4 border border-gray-400 rounded shadow-lg hover:bg-gray-300">Editar</button>
    </a>
</div>

            <!-- INFORMACION DE CONTACTO -->
            <div class="p-4 md:p-8">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Información de contacto</h3>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

        <!-- CORREO ELECTRONICO -->
        <p><strong>Correo electrónico:</strong> {{$usuario->email}} </p>

        <!-- TELEFONO -->
        <p><strong>Teléfono:</strong> {{$usuario->telefono}} </p>

        <!-- FECHA DE NACIMIENTO -->
        <p><strong>Fecha de nacimiento:</strong> {{ $usuario->fechaNacimiento }}</p>

        <!-- GÉNERO -->
        <p><strong>Género:</strong> {{ $usuario->genero }}</p>

        <!-- DNI -->
        <p><strong>Dni:</strong> {{ $usuario->dni }}</p>
    </div>
</div>

            <!-- BOTONES -->
            <div class="px-8 pb-8 grid grid-cols-2 gap-4 text-center">

                <!-- VER PRODUCTOS -->
                <a href="{{ route('favoritos') }}" class="bg-white hover:bg-gray-300 text-dark border border-gray-400 shadow-lg font-bold py-2 px-4 rounded transition duration-200 ease-in-out">
                    Ver Favoritos
                </a>

                <!-- VER OPINIONES -->
                <a href="{{ route('venta') }}" class="bg-white hover:bg-gray-300 text-dark border border-gray-400 shadow-lg font-bold py-2 px-4 rounded transition duration-200 ease-in-out">
                    Ver Mis Productos
                </a>
            </div>
        </div>
    </div>

    <!-- OPINIONES -->
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