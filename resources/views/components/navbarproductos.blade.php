<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resmoke - Productos</title>
    <link rel="shortcut icon" href="{{ asset('storage/logo resmoke.png' )}}" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.0/dist/alpine.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <link href="https://cdn.jsdelivr.net/npm/daisyui@4.11.1/dist/full.min.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.tailwindcss.com"></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
</head>

<body>

    <!-- INICIO HEADER SECTION -->
    <header class="bg-white shadow top-0 left-0 right-0 z-10">
        <div class="container mx-auto flex flex-wrap items-center justify-between p-5">

            <a href="/welcome" class="flex items-center text-gray-900 mr-4">
                <img src="{{ asset('storage/logo resmoke.png' )}}" alt="Logo" class="h-24">
            </a>

            <form method="post" action="{{ route('buscador') }}" class="relative text-gray-600 mr-4 flex-1 min-w-0">
                @csrf
                <input type="text" name="buscador" placeholder="Busca lo que necesites ..." class="bg-white h-10 px-5 pr-10 border-2 rounded-full text-sm focus:outline-none w-full">
            </form>
            @auth
            <div class="flex items-center">

                <a href="{{ route('addProducto') }}" class="inline-flex items-center justify-center border-2 border-black text-black bg-white hover:bg-gray-100 hover:text-gray-700 rounded text-sm py-2 px-3 mr-2 focus:outline-none focus:ring-2 focus:ring-gray-300 transition-colors duration-150">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 5a1 1 0 011 1v3h3a1 1 0 110 2h-3v3a1 1 0 11-2 0v-3H6a1 1 0 110-2h3V6a1 1 0 011-1z" clip-rule="evenodd" />
                    </svg>
                    Añadir Producto
                </a>

                @if (Auth::user()->rol == "administrador")
                <a href="{{ route('adminInicio') }}">
                    <button class="inline-flex items-center border-2 border-black text-black bg-white hover:bg-gray-100 rounded text-sm py-2 px-3 mr-2">
                        Panel Admin
                    </button>
                </a>
                @endif
                <button id="dropdownHoverButton" data-dropdown-toggle="dropdownHover" data-dropdown-trigger="click" class="focus:ring-4 focus:outline-none font-medium rounded-full text-sm text-center inline-flex items-center " type="button"><img src="{{ asset('storage/fotoPerfil'. Auth::user()->id .'.png')}}" alt="Perfil" class="h-12 w-12 rounded-full border-2 border-black"><svg class="w-2.5 h-2.5 ms-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4" />
                    </svg>
                </button>

                <!-- Dropdown menu -->
                <div id="dropdownHover" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
                    <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownHoverButton">
                        <li><a href="{{ route('favoritos') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Favoritos</a></li>
                        <li><a href="{{ route('venta') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Productos</a></li>
                        <li><a href="{{ route('compras') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Compras</a></li>
                        <hr>
                        <a href="/web/verPerfil" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Perfil</a>
                        <hr>
                        <a href="{{ route('milogout') }}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Cerrar Sesión</a>
                    </ul>
                </div>

            </div>
            @else
            <nav class="md:ml-auto flex flex-wrap items-center text-base justify-center">
                <a href="{{ route('login') }}">
                    <button class="inline-flex items-center border-2 border-black text-black bg-white hover:bg-gray-100 rounded text-base mt-4 md:mt-0 py-1 px-3 focus:outline-none mr-5">Iniciar sesión</button>
                </a>
                <a href="{{ route('register') }}">
                    <button class="inline-flex items-center border-2 border-black text-white bg-black hover:bg-gray-900 rounded text-base mt-4 md:mt-0 py-1 px-3 focus:outline-none">Registrarse</button>
                </a>
            </nav>
            @endauth
        </div>

        <div class="bg-white">
    <div class="container mx-auto px-5">
        <div class="flex flex-wrap justify-start items-center text-black py-2 pl-5">
            <a href="/web/verCategoria/1" class="hover:text-gray-300 mr-4 mb-2 md:mb-0">Cachimbas</a>
            <a href="/web/verCategoria/2" class="hover:text-gray-300 mr-4 mb-2 md:mb-0">Cazoletas</a>
            <a href="/web/verCategoria/3" class="hover:text-gray-300 mr-4 mb-2 md:mb-0">Mangueras</a>
            <a href="/web/verCategoria/4" class="hover:text-gray-300 mr-4 mb-2 md:mb-0">Bases</a>
            <a href="/web/verCategoria/5" class="hover:text-gray-300 mr-4 mb-2 md:mb-0">Accesorios</a>
            <a href="/web/verCategoria/6" class="hover:text-gray-300 mb-2 md:mb-0">Vapers</a>
        </div>
    </div>
</div>
    </header>

    <a href="/chatify" class="fixed bottom-14 right-14 z-50">
        <div class="bg-white border-2 border-gray-900 rounded-full shadow-lg">
            <button class="bg-white p-4 rounded-full shadow-lg focus:outline-none">
                <i class="material-icons text-gray-900 text-3xl">chat</i>
            </button>
        </div>
    </a>