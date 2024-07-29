<x-navbarcontacto></x-navbarcontacto>

<div class="container mx-auto p-6 bg-white rounded-lg shadow-lg my-8">
        <h2 class="text-3xl font-bold mb-6">Mis Productos</h2>
        <div class="grid grid-cols-1 md:grid-cols-1 gap-3">
            <div class=" ">
                <a href="{{ route('editarProducto') }}"><h3 class="text-xl text-gray-600 hover:text-gray-800 hover:font-bold mb-2 mt-5">Editar Producto</h3></a>
            </div>
            <div class=" ">
                <a href="{{ route('productoEliminado') }}"><h3 class="text-xl text-gray-600 hover:text-gray-800 hover:font-bold mb-4">Producto Eliminado</h3></a>
            </div>
        </div>
    </div>