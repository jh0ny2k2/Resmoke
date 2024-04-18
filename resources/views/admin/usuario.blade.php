<x-navbaradmin></x-navbaradmin>

<!-- Content section -->
<div class="flex-1 p-10 ml-60">
            <h1 class="text-4xl font-bold mb-6">Usuarios Registrados</h1>
            <div class="overflow-x-auto">
                <table class="min-w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3">Nombre</th>
                            <th scope="col" class="px-6 py-3">Email</th>
                            <th scope="col" class="px-6 py-3">Género</th>
                            <th scope="col" class="px-6 py-3">Fecha de Nacimiento</th>
                            <th scope="col" class="px-6 py-3">Teléfono</th>
                            <th scope="col" class="px-6 py-3">DNI</th>
                            <th scope="col" class="px-6 py-3">Rol</th>
                            <th scope="col" class="px-6 py-3">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($usuarios as $usuario)
                        <tr class="bg-white border-b">
                            <td class="px-6 py-4">{{ $usuario->name }}</td>
                            <td class="px-6 py-4">{{ $usuario->email }}</td>
                            <td class="px-6 py-4">{{ $usuario->genero }}</td>
                            <td class="px-6 py-4">{{ $usuario->fechaNacimiento }}</td>
                            <td class="px-6 py-4">{{ $usuario->telefono }}</td>
                            <td class="px-6 py-4">{{ $usuario->dni }}</td>
                            <td class="px-6 py-4">{{ $usuario->rol }}</td>
                            <td class="px-6 py-4">
                                <a href="/admin/eliminarUsuario/{{ $usuario->id }}">
                                    <button class="text-red-500 hover:text-red-700">
                                        <span class="material-icons">delete</span>
                                    </button>
                                </a>
                                <a href="/admin/editUsuario/{{ $usuario->id }}">
                                    <button class="text-blue-500 hover:text-blue-700">
                                        <span class="material-icons">edit</span>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        @endforeach
                        <!-- Más filas según los datos disponibles -->
                    </tbody>
                </table>
            </div>
        </div>