<x-navbaradmin></x-navbaradmin>

<div class="flex-1 p-10 ml-60">
    <h1 class="text-4xl font-bold mb-6">Productos</h1>
    <div class="grid grid-cols-2">
        <div>
            <a href="{{ route('verFormularioProducto') }}">
                <button class="py-2 px-4 mb-5 bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white transition ease-in duration-200 text-center text-sm font-medium shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">
                    Añadir Producto
                </button>
            </a>
            <a href="{{ route('verConfirmar') }}">
                <button class="py-2 px-4 mb-5 bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white transition ease-in duration-200 text-center text-sm font-medium shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">
                    Ver Confirmación
                </button>
            </a>
        </div>

    </div>
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
                    <td class="px-6 py-4">{{$producto->nombre}}</td>
                    <td class="px-6 py-4">{{$producto->categorias->nombre}}</td>
                    <td class="px-6 py-4">{{$producto->precio}}</td>
                    <td class="px-6 py-4">{{$producto->estado}}</td>
                    <td class="px-6 py-4 max-w-72">{{$producto->descripcion}}</td>
                    <td class="px-6 py-4">{{$producto->localizacion}}</td>
                    <td class="px-6 py-4">{{$producto->numeroVisto}}</td>
                    <td class="px-6 py-4">
                        <a href="/admin/eliminarProducto/ {{ $producto->id}}">
                            <button class="text-red-500 hover:text-red-700">
                                <span class="material-icons">delete</span>
                            </button>
                        </a>
                        <a href="/admin/editProducto/ {{ $producto->id}}">
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