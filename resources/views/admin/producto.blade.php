<!-- BARRA DE NAVEGACIÓN -->
<x-navbaradmin></x-navbaradmin>

<!-- CONTENIDO -->
<div class="flex-1 p-10 ml-60">
    <div class="flex justify-between mb-6">
        <h1 class="text-4xl font-bold">Productos</h1>

        <!-- BUSCADOR -->
        <form action="/admin/buscadorProducto" method="post" class="flex w-1/2 max-w-xl">
            @csrf
            <input type="text" name="buscador" id="buscador" placeholder="Buscar productos..." class="w-full px-4 py-2 border rounded-l-lg focus:outline-none focus:border-blue-500" />
            <button type="submit" class="px-4 text-white bg-blue-600 rounded-r-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                <span class="material-icons">search</span>
            </button>
        </form>
    </div>

    <!-- BOTONES -->
    <div class="flex justify-between mb-6">

        <!-- AÑADIR PRODUCTO -->
        <a href="{{ route('verFormularioProducto') }}">
            <button class="py-2 px-4 bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white transition ease-in duration-200 text-center text-sm font-medium shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">
                Añadir Producto
            </button>
        </a>

        <!-- VER CONFIRMACIONES -->
        <a href="{{ route('verConfirmar') }}">
            <button class="py-2 px-4 bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white transition ease-in duration-200 text-center text-sm font-medium shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">
                Ver Confirmación
            </button>
        </a>
    </div>

    <!-- TABLA DE PRODUCTOS -->
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">Nombre</th>
                    <th scope="col" class="px-6 py-3">Categoría</th>
                    <th scope="col" class="px-6 py-3">Precio</th>
                    <th scope="col" class="px-6 py-3">Estado</th>
                    <th scope="col" class="px-6 py-3">Descripción</th>
                    <th scope="col" class="px-6 py-3">Localización</th>
                    <th scope="col" class="px-6 py-3">Visto</th>
                    <th scope="col" class="px-6 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($productos as $producto)
                <tr class="bg-white border-b">
                    <td class="px-6 py-4 truncate max-w-36">{{$producto->nombre}}</td>
                    <td class="px-6 py-4">{{$producto->categorias->nombre}}</td>
                    <td class="px-6 py-4">{{$producto->precio}}</td>
                    <td class="px-6 py-4">{{$producto->estado}}</td>
                    <td class="px-6 py-4  truncate max-w-36">{{$producto->descripcion}}</td>
                    <td class="px-6 py-4">{{$producto->localizacion}}</td>
                    <td class="px-6 py-4">{{$producto->numeroVisto}}</td>
                    <td class="px-6 py-4">
                        <a href="/admin/eliminarProducto/{{ $producto->id }}">
                            <button class="text-red-500 hover:text-red-700">
                                <span class="material-icons">delete</span>
                            </button>
                        </a>
                        <a href="/admin/editProducto/{{ $producto->id }}">
                            <button class="text-blue-500 hover:text-blue-700">
                                <span class="material-icons">edit</span>
                            </button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
