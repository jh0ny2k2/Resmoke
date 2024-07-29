<x-navbarcontacto></x-navbarcontacto>

<div class="container mx-auto p-6 bg-white rounded-lg shadow-lg my-8">
        <h2 class="text-3xl font-bold mb-6">Como Comprar Productos en Resmoke</h2>
        <div class="grid grid-cols-1 md:grid-cols-1 gap-3">
            <div>
                <a href="{{ route('filtrosResmoke') }}"><h3 class="text-xl mb-2 mt-5 text-gray-600 hover:text-gray-800 hover:font-bold">Usar Filtros de Búsqueda</h3></a>
            </div>
            <div>
                <a href="{{ route('favoritosResmoke') }}"><h3 class="text-xl text-gray-600 hover:text-gray-800 hover:font-bold mb-2">Guardar Favoritos</h3></a>
            </div>
        </div>
    </div>
