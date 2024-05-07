<x-navbaradmin></x-navbaradmin>

<!-- Content section -->

<div class="flex-1 p-10 ml-60">
    <div class="flex justify-between mb-6">
        <h1 class="text-4xl font-bold">Usuarios Registrados</h1>
        <form action="/admin/buscadorUsuario" method="post" class="flex w-1/2 max-w-xl">
            @csrf
            <input type="text" name="buscador" id="buscador" placeholder="Buscar usuarios..." class="w-full px-4 py-2 border rounded-l-lg focus:outline-none focus:border-blue-500" />
            <button type="submit" class="px-4 text-white bg-blue-600 rounded-r-lg hover:bg-blue-700 focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50">
                <span class="material-icons">search</span>
            </button>
        </form>
    </div>

    <a href="{{ route('verFormularioUsuario') }}">
        <button class="py-2 px-4 mb-5 bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white transition ease-in duration-200 text-center text-sm font-medium shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">
            Añadir Usuario
        </button>
    </a>
    <a href="{{ route('verAdministrador') }}">
        <button class="py-2 px-4 mb-5 bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white transition ease-in duration-200 text-center text-sm font-medium shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">
            Administrador
        </button>
    </a>
    <a href="{{ route('verUsuario') }}">
        <button class="py-2 px-4 mb-5 bg-blue-600 hover:bg-blue-700 focus:ring-blue-500 focus:ring-offset-blue-200 text-white transition ease-in duration-200 text-center text-sm font-medium shadow-md focus:outline-none focus:ring-2 focus:ring-offset-2 rounded-lg">
            Usuarios
        </button>
    </a>

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
                    <td class="px-6 py-4 "><a class="border-2 border-dark-900 px-3 py-2 rounded" href="/admin/editRol/{{ $usuario->id }}">{{ $usuario->rol }}</a></td>

                    <td class="px-6 py-4">
                        <a href="/admin/eliminarUsuario/{{ $usuario->id }}">
                            <button class="text-red-500 hover:text-red-700">
                                <span class="material-icons">delete</span>
                            </button>
                        </a>
                        <a href="/admin/editarUsuario/{{ $usuario->id }}">
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