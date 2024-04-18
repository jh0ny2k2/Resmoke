<x-navbaradmin></x-navbaradmin>

<div class="flex-1 p-10 ml-60">
            <h1 class="text-4xl font-bold mb-6">Productos</h1>
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
                            <td class="px-6 py-4">{{$producto->descripcion}}</td>
                            <td class="px-6 py-4">{{$producto->localizacion}}</td>
                            <td class="px-6 py-4">{{$producto->numeroVisto}}</td>
                            <td class="px-6 py-4">
                                <a href="/admin/eliminarProducto/ {{ $producto->id}}">
                                    <button class="text-red-500 hover:text-red-700">
                                        <span class="material-icons">delete</span>
                                    </button>
                                </a>
                                <a href="/admin/editarProducto/ {{ $producto->id}}">
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