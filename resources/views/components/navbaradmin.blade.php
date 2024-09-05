<!DOCTYPE html>
<html lang="en" x-data="{ isOpen: false }">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resmoke - Admin Principal</title>
    <link rel="shortcut icon" href="Img/logo resmoke.png" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.0/dist/alpine.min.js"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body class="relative">
<!-- Button to open the navbar -->
<div class="p-4">
    <button @click="isOpen = !isOpen" class="text-white bg-blue-600 p-2 rounded-lg md:hidden">
        <span class="material-icons">menu</span>
    </button>
</div>

<!-- Overlay (closes the navbar if clicked) -->
<div 
    x-show="isOpen" 
    @click="isOpen = false" 
    class="fixed inset-0 bg-black bg-opacity-50 z-40 md:hidden"
    x-cloak
></div>

<!-- Navbar section -->
<div
    class="fixed inset-y-0 left-0 z-50 flex flex-col w-64 h-full p-5 bg-gradient-to-b from-blue-600 to-blue-900 text-white shadow-xl transition-transform transform md:translate-x-0"
    :class="isOpen ? 'translate-x-0' : '-translate-x-full'"
>
    <a href="/welcome">
        <img src="{{ asset('storage/logo resmoke.png') }}" alt="Logo" class="h-24 w-auto mb-10 mx-auto">
    </a>
    <ul class="flex flex-col gap-5">
        <li>
            <a href="{{ route('adminInicio') }}" class="flex items-center px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                <span class="material-icons mr-3">home</span>
                Inicio
            </a>
        </li>
        <li>
            <a href="{{ route('adminUsuario') }}" class="flex items-center px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                <span class="material-icons mr-3">people</span>
                Usuarios
            </a>
        </li>
        <li>
            <a href="{{ route('adminProducto') }}" class="flex items-center px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                <span class="material-icons mr-3">inventory_2</span>
                Productos
            </a>
        </li>
        <li>
            <a href="{{ route('adminCategoria') }}" class="flex items-center px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                <span class="material-icons mr-3">category</span>
                Categorías
            </a>
        </li>
        <li>
            <a href="{{ route('adminFavorito') }}" class="flex items-center px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                <span class="material-icons mr-3">favorite_border</span>
                Favoritos
            </a>
        </li>
        <li>
            <a href="{{ route('adminOpiniones') }}" class="flex items-center px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                <span class="material-icons mr-3">rate_review</span>
                Opiniones
            </a>
        </li>
        <li>
            <a href="{{ route('adminContacto') }}" class="flex items-center px-4 py-2 rounded-lg hover:bg-blue-700 transition-colors">
                <span class="material-icons mr-3">chat</span>
                Contacto
            </a>
        </li>
    </ul>
</div>

<!-- Alpine.js root -->
<script>
    document.addEventListener('alpine:init', () => {
        Alpine.data('navbar', () => ({
            isOpen: false
        }))
    })
</script>