<!-- BARRA DE NAVEGACION -->
<x-navbarvproducto></x-navbarvproducto>

<div class="container mx-auto px-4 py-8">

    <!-- BOTON VOLVER ATRAS -->
    <x-boton-atras></x-boton-atras>

    <div class="w-full max-w-full pl-44 bg-white p-6 mx-auto rounded-lg shadow-lg">
        <ol class="flex items-center w-full">
            <li class="flex w-full items-center text-blue-600 dark:text-blue-500 after:content-[''] after:w-full after:h-1 after:border-b after:border-blue-100 after:border-4 after:inline-block dark:after:border-blue-800">
                <span class="flex items-center justify-center w-10 h-10 bg-blue-100 rounded-full lg:h-12 lg:w-12 dark:bg-blue-800 shrink-0">
                <svg class="w-4 h-4 text-blue-600 lg:w-4 lg:h-4 dark:text-blue-300" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                </svg>
                </span>
            </li>
            <li class="flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-100 after:border-4 after:inline-block dark:after:border-gray-700">
                <span class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0">
                <svg class="w-4 h-4 text-gray-500 lg:w-7 lg:h-7dark:text-gray-100" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 16">
                    <path d="M18 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2ZM6.5 3a2.5 2.5 0 1 1 0 5 2.5 2.5 0 0 1 0-5ZM3.014 13.021l.157-.625A3.427 3.427 0 0 1 6.5 9.571a3.426 3.426 0 0 1 3.322 2.805l.159.622-6.967.023ZM16 12h-3a1 1 0 0 1 0-2h3a1 1 0 0 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Zm0-3h-3a1 1 0 1 1 0-2h3a1 1 0 1 1 0 2Z"/>
                </svg>
                </span>
            </li>
            <li class="flex w-full items-center after:content-[''] after:w-full after:h-1 after:border-b after:border-gray-100 after:border-4 after:inline-block dark:after:border-gray-700">
                <span class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0">
                    <img src="{{ asset('storage/dinero.png') }}" alt="Imagen del producto" class="w-5 h-5 text-gray-500 lg:w-7 lg:h-7 dark:text-gray-100">
                </span>
            </li>
            <li class="flex items-center w-full">
                <span class="flex items-center justify-center w-10 h-10 bg-gray-100 rounded-full lg:h-12 lg:w-12 dark:bg-gray-700 shrink-0">
                <svg class="w-4 h-4 text-gray-500 lg:w-5 lg:h-5 dark:text-gray-100" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                    <path d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2ZM7 2h4v3H7V2Zm5.7 8.289-3.975 3.857a1 1 0 0 1-1.393 0L5.3 12.182a1.002 1.002 0 1 1 1.4-1.436l1.328 1.289 3.28-3.181a1 1 0 1 1 1.392 1.435Z"/>
                </svg>
                </span>
            </li>
        </ol>
    </div>    

    <div class="bg-white px-6 py-6 rounded-lg shadow-lg w-full ">
        <h1 class="text-4xl font-bold">Marcar como Reservado - Usuario</h1>
        <h2 class="pt-2 pb-8">Busca al usuario comprador</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">

            <!-- Buscador de usuario -->
            <div class="flex-1">
                <form action="/web/buscadorUsuarioReservado" method="post">
                @csrf
                    <label for="buscador" class="block text-sm font-medium text-gray-700">Buscar usuario</label>
                    <input type="text" id="buscador" name="buscador" class="mt-1 p-2 block w-full border border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Introduce nombre del usuario">
                </form>
                
                <!-- Resultado de la búsqueda -->
                <div id="resultadoBusqueda" class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                    @if(isset($usuarios))
                        @foreach($usuarios as $usuario)      
                        <a href="/web/precioReservado/{{ $producto->id }}/{{ $usuario->id }}" class="block p-4 border text-gray-900 border-gray-300 rounded-lg shadow-md hover:bg-gray-200 transition duration-300 mt-2">
                            <div class="flex items-center">
                                <img src="{{ asset('storage/fotoPerfil'. $usuario->id .'.png') }}" alt="Perfil" class="h-12 w-12 rounded-full mr-4"> 
                                <span class="text-sm font-medium">{{ $usuario->name }}</span>
                            </div>
                        </a>
                        @endforeach 
                    @endif
                </div>
            </div>

            <!-- Sección de producto -->
            <div class="flex-shrink-0">
                <label class="block text-sm font-medium text-gray-700">Producto</label>
                <div class="mt-1 p-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm">
                <img src="{{ asset('storage/producto_' . $producto->id . '.jpg') }}" alt="Imagen del producto" class="w-full h-auto rounded-md">
                <p class="mt-2 text-center">{{ $producto->nombre }}</p>
                </div>
            </div>

            <!-- Sección precio -->
            <div class="flex-shrink-0">
                <label class="block text-sm font-medium text-gray-700">Precio Actual</label>
                <div class="mt-1 p-2 bg-gray-50 border border-gray-300 rounded-md shadow-sm">
                <p class="text-center">{{ $producto->precio }} €</p>
                </div>
            </div>
        </div>
    </div>
    </div>

<!-- FOOTER -->
<x-footer></x-footer>