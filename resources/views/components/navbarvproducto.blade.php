<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resmoke - </title>

    <title>Geocoding Service</title>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

    <!-- ICONO PAGINA -->
    <link rel="shortcut icon" href="{{ asset('storage/logo resmoke.png' )}}" />

    <!-- TAILWIND -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.0/dist/alpine.min.js"></script>

    <!-- ICONOS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/material-design-iconic-font/2.2.0/css/material-design-iconic-font.min.css">

    <!-- MAPAS -->
    <script src="https://js.api.here.com/v3/3.1/mapsjs-core.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://js.api.here.com/v3/3.1/mapsjs-service.js" type="text/javascript" charset="utf-8"></script>
    <script src="https://js.api.here.com/v3/3.1/mapsjs-ui.js" type="text/javascript" charset="utf-8"></script>
    <link rel="stylesheet" type="text/css" href="https://js.api.here.com/v3/3.1/mapsjs-ui.css" />

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- ESTILO MODAL -->
    <style>
        /* Estilo adicional para ocultar el modal */
        .modal {
            display: none;
            position: fixed;
            z-index: 10;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0,0,0,0.5);
        }
    </style>
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
                <div x-data="{ open: false }" class="inline-block">
                    <a href="#" class="inline-block" @click.prevent="open = !open">
                        <img src="{{ asset('storage/fotoPerfil'. Auth::user()->id .'.png')}}" alt="Perfil" class="h-12 w-12 rounded-full border-2 border-black">
                    </a>
                    <div x-show="open" @click.outside="open = false" class="absolute mt-2 py-2 w-48 bg-white rounded-md shadow-xl z-20">
                        <a href="{{ route('favoritos') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Mis Favoritos</a>
                        <a href="{{ route('venta') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Mis Productos</a>
                        <hr>
                        <a href="/web/verPerfil" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Perfil</a>
                        <hr>
                        <a href="{{ route('milogout') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Cerrar Sesión</a>
                    </div>
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
    </header>

    <a href="/chatify">
        <div class="fixed bottom-14 right-14 shadow-lg border-2 border-gray-900 rounded-full">
            <button class="bg-white p-4 rounded-full shadow-lg">
                <i class="material-icons text-gray-900 text-3xl">chat</i>
            </button>
        </div>
    </a>