<x-navbaradmin></x-navbaradmin>

<div class="flex-1 p-10 ml-60">
            <h1 class="text-4xl font-bold mb-6">Opiniones de Clientes</h1>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">Nombre Comprador</th>
                            <th scope="col" class="px-6 py-3">Nombre Vendedor</th>
                            <th scope="col" class="px-6 py-3">Estrellas</th>
                            <th scope="col" class="px-6 py-3">Opinión</th>
                            <th scope="col" class="px-6 py-3">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($opiniones as $opinion)
                        <tr class="bg-white border-b">
                            <td class="px-6 py-4">{{ $opinion->usuarioId }}</td>
                            <td class="px-6 py-4">{{ $opinion->vendedorId}}</td>
                            <td class="px-6 py-4">
                                <span class="flex items-center">
                                    <span class="material-icons text-yellow-500">star</span>
                                    <span class="material-icons text-yellow-500">star</span>
                                    <span class="material-icons text-yellow-500">star</span>
                                    <span class="material-icons text-yellow-500">star</span>
                                    <span class="material-icons text-gray-300">star</span>
                                </span>
                            </td>
                            <td class="px-6 py-4">{{ $opinion->opinion}}</td>
                            <td class="px-6 py-4">
                                <button class="text-red-500 hover:text-red-700">
                                    <span class="material-icons">delete</span>
                                </button>
                                <button class="text-blue-500 hover:text-blue-700">
                                    <span class="material-icons">edit</span>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>