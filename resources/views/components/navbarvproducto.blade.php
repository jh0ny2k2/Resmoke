<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resmoke - Productos</title>
    <link rel="shortcut icon" href="Img/logo resmoke.png" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.0/dist/alpine.min.js"></script>
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

                    <a href="addProducto.html">
                        <button class="inline-flex items-center border-2 border-black text-black bg-white hover:bg-gray-100 rounded text-sm py-2 px-3 mr-2">
                            + Añadir Producto
                        </button>
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
                            <a href="favoritos.html" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Favoritos</a>
                            <a href="productosPerfil.html" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">En venta</a>
                            <hr>
                            <a href="perfil.html" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Perfil</a>
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