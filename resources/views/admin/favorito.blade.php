<x-navbaradmin></x-navbaradmin>

<div class="flex-1 p-10 ml-60">
            <h1 class="text-4xl font-bold mb-6">Favoritos</h1>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">Nombre de Usuario</th>
                            <th scope="col" class="px-6 py-3">Nombre de Artículo</th>
                            <th scope="col" class="px-6 py-3">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($favoritos as $favorito)
                        <tr class="bg-white border-b">
                            <td class="px-6 py-4">{{ $favorito->usuarios->name }}</td>
                            <td class="px-6 py-4">{{ $favorito->productos->nombre }}</td>
                            <td class="px-6 py-4">
                                <a href="/admin/eliminarFavorito/{{ $favorito->id }}">
                                    <button class="text-red-500 hover:text-red-700">
                                        <span class="material-icons">delete</span>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>