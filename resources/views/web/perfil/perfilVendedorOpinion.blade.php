<!-- BARRA DE NAVEGACION -->
<x-navbarvproducto></x-navbarvproducto>

<!-- BOTON VOLVER ATRAS -->
<x-boton-atras></x-boton-atras>

<!-- PERFIL -->
<div class="flex justify-center min-h-52 ">
    <div class="max-w-4xl w-full my-5 bg-white rounded-lg shadow-xl border">
        <div class="flex justify-between items-center border-b p-8">
            <div class="flex items-center">

                <!-- FOTO DE PERFIL -->
                <img src="{{ asset('storage/fotoPerfil'. $usuario->id .'.png') }}" alt="Perfil" class="h-28 w-28 shadow-lg rounded-full object-cover mr-6">
                <div>

                    <!-- NOMBRE -->
                    <h2 class="text-2xl font-semibold uppercase"> {{$usuario->name}} </h2>
                </div>
            </div>

            <!-- AÑADIR OPINION -->
            <a href="/web/addOpinion/{{ $usuario->id }}">
                <button class="text-dark font-semibold py-2 px-4 border-dark border border-gray-400 rounded shadow-lg hover:bg-gray-300">Añadir Opinión</button>
            </a>
        </div>

        <!-- INFORMACION DE CONTACTO -->
        <div class="p-8">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Información de contacto</h3>
            <div class="grid grid-cols-2">

                <!-- CORREO ELECTRONICO -->
                <p><strong>Correo electrónico:</strong> {{$usuario->email}} </p>

                <!-- TELEFONO -->
                <p><strong>Teléfono:</strong> {{$usuario->telefono}} </p>
            </div>
        </div>
    </div>
</div>

<!-- OPINIONES -->
<div class="flex justify-center min-h-52">
    <div class="max-w-4xl w-full my-5 bg-white rounded-lg border shadow-xl">
        <div class="p-8">
            <h3 class="text-lg font-semibold text-gray-800 mb-4">Algunas Opniones</h3>
            <div class="grid grid-cols-2">
                @foreach ($opiniones as $opinion)

                    <article class="ml-2 mt-2 p-4 border border-dark rounded">
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