<x-navbarcontacto></x-navbarcontacto>

<div class="container mx-auto p-6 bg-white rounded-lg shadow-lg my-8">
        <h2 class="text-3xl font-bold mb-6">Mis Productos</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class=" p-6 ">
                <a href="{{ route('queSon') }}"><h3 class="text-xl mb-4 text-gray-600 hover:text-gray-800 hover:font-bold">¿Qué son los destacados?</h3></a>
            </div>
            <div class=" p-6 ">
                <a href="{{ route('comoDestacar') }}"><h3 class="text-xl text-gray-600 hover:text-gray-800 hover:font-bold mb-4">Cómo Destacar</h3></a>
            </div>
        </div>
    </div>