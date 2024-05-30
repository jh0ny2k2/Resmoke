<x-navbaradmin></x-navbaradmin>

<div class="flex-1 p-10 ml-60">
    <div class="flex justify-between mb-6">
        <h1 class="text-4xl font-bold">Contacto</h1>
    </div>
    <div class="overflow-x-auto">
        <table class="min-w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3">Nombre Usuario</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">comentario</th>
                    <th scope="col" class="px-6 py-3">Estado</th>
                    <th scope="col" class="px-6 py-3">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($contactos as $contacto)
                <tr class="bg-white border-b">
                    <td class="px-6 py-4">{{ $contacto->nombre }}</td>
                    <td class="px-6 py-4">{{ $contacto->email }}</td>
                    <td class="px-6 py-4">{{ $contacto->comentario}}</td>
                    <td class="px-6 py-4">{{ $contacto->estado}}</td>
                    <td class="px-6 py-4 justify-center">
                        <a href="/admin/verContacto/{{ $contacto->id }}">
                            <button class="text-yellow-500 hover:text-yellow-700">
                                <span class="material-icons">visibility</span>
                            </button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>