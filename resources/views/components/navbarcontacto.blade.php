<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resmoke - Productos</title>
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="shortcut icon" href="{{ asset('storage/logo resmoke.png' )}}" />
</head>
<body class="bg-gray-100">

    <header class="bg-white shadow-xl p-4">
        <div class="container mx-auto flex justify-between items-center">
            <div class="flex items-center">
                <img src="{{ asset('storage/logo resmoke.png' )}}" alt="Logo de la Marca" class="h-16 mr-3">
                <span class="text-xl font-bold"></span>
            </div>
            <div class="flex space-x-4">
                <a href="/welcome" class="text-gray-600 hover:text-gray-800">Volver a Resmoke</a>
                <a href="{{ route('contacto') }}" class="text-gray-600 hover:text-gray-800">Ayuda Resmoke</a>
            </div>
        </div>
    </header>