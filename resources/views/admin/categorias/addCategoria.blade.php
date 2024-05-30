<!-- BARRA DE NAVEGACION -->
<x-navbaradmin></x-navbaradmin>

<!-- CONTENIDO -->
<div class="flex-1 p-10 ml-64">
    <div class="max-w-4xl mx-auto p-6 bg-white shadow-lg rounded-lg">
        <form class="space-y-4" method="POST" action="/admin/addCategoria" enctype="multipart/form-data">
            @csrf

            <!-- TITULO -->
            <h2 class="text-2xl font-bold text-gray-800">Añadir Categoria</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <!-- NOMBRE -->
                <div>
                    <label for="nombre" class="block text-sm font-medium text-gray-700">Nombre</label>
                    <input type="text" id="nombre" name="nombre" required class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50">
                </div>
            </div>

            <!-- BOTON -->
            <button type="submit" class="w-full py-2 px-4 bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white transition ease-in duration-200 text-center text-base font-semibold shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">
                Añadir Categoria
            </button>
        </form>
    </div>
</div>

