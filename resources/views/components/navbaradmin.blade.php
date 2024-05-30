<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resmoke - Admin Principal</title>
    <link rel="shortcut icon" href="Img/logo resmoke.png" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@2.8.0/dist/alpine.min.js"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<body>
    <div class="flex h-screen bg-gray-50">
        <!-- Navbar section -->
        <div class="flex flex-col w-64 h-full p-5 bg-gradient-to-b from-blue-600 to-blue-900 text-white shadow-xl fixed ">
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

